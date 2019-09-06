<template>
        <div>
          <h2>Search and add a pin</h2>
              <label>
                <gmap-autocomplete
                  @place_changed="setPlace">
                </gmap-autocomplete>
                <button @click="addMarker">Add</button>
              </label>
              <br/>
          <GmapMap
            id="googlemap"
            ref="map"
            :center="center"
            :zoom="10"
            style="min-height: 300px;"
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

        <input type="text" name="new_lat" v-model="new_lat" id="new_lat">
        <input type="text" name="new_long" v-model="new_long" id="new_long">
        </div>
</template>
<script>
export default {
  name: "GoogleMap",
  data () {
    return {
      markers: [
        { position: { lat: 16.9239, lng: 96.2270 } }
      ],
      addresses: [],
      places: [],
      center: { lat: 16.9239, lng: 96.2270 },
      selected: '',
      new_lat: '',
      new_long: ''
    }
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