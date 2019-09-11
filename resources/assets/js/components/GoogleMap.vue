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
      new_long: ''
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
    }
  }
};

</script>