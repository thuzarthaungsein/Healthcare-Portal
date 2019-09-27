<template>
        <div class="col-md-12 pad-free m-t-15 m-b-20">
          <h4>Search Your Place Here</h4>
              <div class="col-md-12 pad-free">
                <gmap-autocomplete
                  @place_changed="setPlace" class="form-control">
                </gmap-autocomplete>
                <!-- <span @click="addMarker">Add</span> -->
              </div>
              <br/>
              <div class="col-md-12 pad-free" v-if="address_btn">
                <label>住所:</label>
                {{comment.gmap_city}}
              </div>
              <br/>
          <GmapMap
            id="googlemap"
            ref="map"
            :center="center"
            :zoom="10"
          >
            <GmapMarker
              v-for="(m, index) in markers"
              :key="index"
              :position="m.position"
              :clickable="true"
              :draggable="true"
              @click="center=m.position"
              @dragend="updateCoordinates"
            />
          </GmapMap>
          <div class="form-group">
            <label>郵便番号<span class="error">*</span></label>
            <input type="text" v-model="comment.postal" name="postal" class="postal form-control" id="postal" v-on:keyup="getPostal" placeholder="郵便番号を入力してください。" maxlength="7"/>
            <div id="jsErrorMessage"></div>
          </div>
          <div class="form-group">
            <label>市区町村、番地（建物名）<span class="error">*</span></label>
            <input type="text" id="city" name="city" class="city form-control" placeholder="市区町村、番地を入力してください。" v-model="comment.city">
            <p>例）東京都千代田区丸の内1-9-1　グラントウキョウノースタワー40階</p>
            <br/>
            <button type="button" class="submit2 btn btn-primary m-t-0 m-l-10" @click="searchAddress()">同意して進む</button>
          </div>
          <input type="hidden" name="new_lat" v-model="new_lat" id="new_lat">
          <input type="hidden" name="new_long" v-model="new_long" id="new_long">
        </div>
</template>
<script>
export default {
  name: "GoogleMap",
  data () {
    return {
      markers: [
        { position: { lat: 35.6803997, lng: 139.76901739 } }
      ],
      addresses: [],
      places: [],
      center: { lat: 35.6803997, lng: 139.76901739 },
      selected: '',
      new_lat: '',
      new_long: '',
      comment: {
        postal: '',
        city: '',
        gmap_city: ''
      },
      address_btn: false,
    }
  },
  created() {
   
    this.new_lat = 35.6803997;
    this.new_long = 139.76901739;
  },
  methods: {    
    // receives a place object via the autocomplete component
    addressSelect: function (e) {
      // Add a new marker
      this.markers.push({
        position: {
          lng: this.addresses[e.target.options.selectedIndex].longitude,
          lat: this.addresses[e.target.options.selectedIndex].latitude
        }
      });
      // Remove the previous marker
      this.markers.shift()   
      // Scroll the map to the new position
      this.$refs.map.$mapPromise.then((map) => {
        map.panTo({
          lng: this.addresses[e.target.options.selectedIndex].longitude,
          lat: this.addresses[e.target.options.selectedIndex].latitude
        });
      });
    },

    updateCoordinates(e) {
      $('#new_lat').val(e.latLng.lat());
      $('#new_long').val(e.latLng.lng());
    },

    setPlace(place) {
      this.currentPlace = place;
      this.addMarker();
    },

    //Auto complete Search
    addMarker() {
      this.markers.shift()
      if (this.currentPlace) {
        const marker = {
          lat: this.currentPlace.geometry.location.lat(),
          lng: this.currentPlace.geometry.location.lng()
        };
        this.markers.push({ position: marker });
        this.places.push(this.currentPlace);
        this.center = marker;
        this.currentPlace = null;

        this.new_lat = marker.lat;
        this.new_long = marker.lng;
        
      }
    },
    geolocate: function() {
      navigator.geolocation.getCurrentPosition(position => {
        this.center = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };
      });
    },
    getPostal: function(event) {
                if (this.comment.postal.length > 4) {
                    var postal = this.comment.postal;
                    this.axios
                        .post('/api/hospital/postList/' + postal)
                        .then(response => {
                            var post_data = response.data;
                            var length = response.data.length;
                            if (length > 0) {
                                var pref = post_data[0]['city_id'];
                                if (post_data[0]['street'] == '') {
                                    this.comment.city = post_data[0]['pref'] + ' - ' +  post_data[0]['city'];
                                } else {
                                    this.comment.city = post_data[0]['pref'] + ' - ' + post_data[0]['city'] + ' - ' + post_data[0]['street'];
                                }
                                $('#jsErrorMessage').html('<div></div>');
                            }else {
                                this.comment.city = '';
                                $('#jsErrorMessage').html('<div class="error">郵便番号の書式を確認してください。</div>');
                            }
                        });
                }
            },
            searchAddress (){
              this.address_btn = true;
              if(this.address_btn){
                this.comment.gmap_city = this.comment.city;
              }else{
                this.comment.gmap_city = '';
              }
              
            }
  }
};

</script>