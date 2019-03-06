<template>
    <div class="flex flex-col">
      <gmap-map
        :center="center"
        :zoom="17"
        ref="mapRef"
        style="height: 430px;"
      >
        <gmap-marker
          v-for="(restaurant, index) in restaurants"
          :icon="getMarkerColor(restaurant)"
          :key="index"
          :position="getPosition(restaurant)"
          @click="setSelectedRestaurant(restaurant)"
        >
        </gmap-marker>
      </gmap-map>

      <div class="mt-12" v-if="loadingLocation">
        Loading your location...
      </div>

      <div class="mt-12" v-if="!loadingLocation">
        <span class="block font-bold mb-4 text-lg">5 closest restaurants:</span>
        <ul>
          <li v-for="(restaurant, index) in closeRestaurants">
            {{ restaurant.name }}
          </li>
        </ul>
      </div>
    </div>
</template>

<script>
export default {
  props: {
    restaurants: {
      type: Array,
      default: () => []
    }
  },

  data() {
    return {
      center: {
        lat: 30,
        lng: -82,
      },
      closeRestaurants: [],
      loadingLocation: true,
      selectedRestaurant: null,
    };
  },

  mounted() {
    navigator.geolocation.getCurrentPosition(position => {
      this.loadingLocation = false;

      this.center = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };

      window.axios
        .request({
          url: `/api/restaurants/near?latitude=${position.coords.latitude}&longitude=${position.coords.longitude}`,
          method: 'get',
        })
        .then(response => {
          this.closeRestaurants = response.data;
        });
    });

    this.$refs.mapRef.$mapPromise.then((map) => {
      map.data.loadGeoJson('./service-areas.geojson');
    });
  },

  methods: {
    getPosition(restaurant) {
      return { lat: restaurant.latitude, lng: restaurant.longitude };
    },

    setSelectedRestaurant(restaurant) {
      this.selectedRestaurant = restaurant;
    },

    getMarkerColor(restaurant) {
      if (this.selectedRestaurant && this.selectedRestaurant.id == restaurant.id) {
        return null;
      }

      return "https://maps.google.com/mapfiles/ms/icons/ltblue-dot.png";
    }
  }
};
</script>
