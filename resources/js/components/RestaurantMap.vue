<template>
    <div class="flex flex-col">
      <gmap-map
        :center="center"
        :zoom="17"
        style="height: 430px;"
      >
        <gmap-marker
          v-for="(restaurant, index) in restaurants"
          :key="index"
          :position="getPosition(restaurant)"
          @click="setSelectedRestaurant(restaurant)"
        >
        </gmap-marker>
      </gmap-map>

      <div class="mt-12">
          @todo list of restaurants here
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
    };
  },

  mounted() {
    navigator.geolocation.getCurrentPosition(position => {
      this.center = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
    });
  },

  methods: {
    getPosition(restaurant) {
      return { lat: restaurant.latitude, lng: restaurant.longitude };
    },
  }
};
</script>
