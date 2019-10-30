<template>
        <div class="col-md-12 pad-free m-b-10">
          
              <div class="col-md-12 pad-free">
                <div class="col-md-12 pad-free postal-search">
                  <div class="form-group m-t-10">
                    <label>郵便番号<span class="error">*</span></label>
                    <input type="text" v-model="comment.postal" name="postal" class="postal form-control white-bg-color" id="postal" v-on:keyup="getPostal" placeholder="郵便番号を入力してください。" maxlength="7"/>
                    <div id="jsErrorMessage"></div>
                  </div>
                  <div class="form-group">
                    <label>市区町村、番地（建物名）<span class="error">*</span></label>
                    <div class="row">
                      <div class="col-md-10" v-if="status === '0'">
                        <input type="text" id="city" name="city" class="old-city form-control white-bg-color" placeholder="市区町村、番地を入力してください。" v-model="address">                        
                      </div>
                      <div class="col-md-10" v-else>
                        <input type="text" id="city" name="city" class="city form-control white-bg-color" placeholder="市区町村、番地を入力してください。" v-model="comment.city">
                        
                      </div>
                      <div class="col-md-2">
                        <span class="btn news-post-btn all-btn" @click="searchAddress()">番地検索</span>
                      </div>
                    </div>
                    <p>例）東京都千代田区丸の内1-9-1　グラントウキョウノースタワー40階</p>                                    
                  </div>
                </div>           

                <label>場所検索はこちら</label>
                <gmap-autocomplete
                  @place_changed="setPlace" v-bind:value="comment.city" class="form-control m-b-10" id="gmap-search" style="display:none;">
                </gmap-autocomplete>
                <gmap-autocomplete
                  @place_changed="setPlace" class="form-control m-b-10 white-bg-color" id="gmap-search2" placeholder="場所を入力してください">
                </gmap-autocomplete>
                <!-- <span @click="addMarker">Add</span> -->
              </div>              
              <!-- <div class="col-md-12 pad-free" v-if="address_btn">
                <label>住所:</label>
                {{comment.gmap_city}}
              </div>            -->
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
          
          <input type="hidden" name="new_lat" v-model="new_lat" id="new_lat">
          <input type="hidden" name="new_long" v-model="new_long" id="new_long">
        </div>
</template>
<script>
export default {
  name: "GoogleMap",
  props:{
         address:String,
        },
  data () {
    return {
      status:'0',
      markers: [],
      addresses: [],
      places: [],
      center:{},
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
    this.markers = [{
        position: {
          lat: Number(localStorage.getItem('lat_num')),
          lng: Number(localStorage.getItem('lng_num'))
        }
      }];
    this.new_lat = Number(localStorage.getItem('lat_num'));
    this.new_long = Number(localStorage.getItem('lng_num'));
console.log(localStorage.getItem('lat_num'));
console.log(localStorage.getItem('lng_num'));
    this.center = { lat: Number(localStorage.getItem('lat_num')), lng: Number(localStorage.getItem('lng_num')) }
    
    $('#gmap-search').css({'display':'none'});
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
        console.log(marker)
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
    searchplace(){
      this.comment.gmap_city = this.comment.city;
      $('#gmap-search').focus();
      
    }, 
    getPostal: function(event) {
                this.status = 1;
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
                // $('#gmap-search').focus();
                // this.comment.gmap_city = this.comment.city;
                $('#gmap-search').css({'display':'block'});
                $('#gmap-search2').css({'display':'none'});
                $('#gmap-search').focus();
                
              }else{
                this.comment.gmap_city = '';
              }
              
            },
            
  }
};

</script>