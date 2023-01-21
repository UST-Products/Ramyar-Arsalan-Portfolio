<template>
  <div>
    <v-carousel
      hide-delimiter-background
      class="slider"
    >
    <template v-slot:prev="{ on, attrs }">
      <v-btn
        :color="$vuetify.theme.dark==true ? 'bg_mode ' : 'background-color-main'"
        v-bind="attrs"
        v-on="on"
      >{{langkeyword('NEXT')}}</v-btn>
    </template>
    <template v-slot:next="{ on, attrs }">
      <v-btn
      :color="$vuetify.theme.dark==true ? 'bg_mode ' : 'background-color-main'"
        v-bind="attrs"
        v-on="on"
      >{{langkeyword('PREVIOUS')}}</v-btn>
    </template>
      <v-carousel-item
        v-for="(item, index) in sliders"
        :key="index"
        :src="uploadPath('/dashboard/sliders/' + item.avatar)"
        style=";object-fit: contain"
        reverse-transition="fade-transition"
        transition="fade-transition"
      >
      </v-carousel-item>
    </v-carousel>
  </div>
</template>

<script>
export default {
  data() { 
    return {};
  },
  computed: {
    sliders() {
      return this.$store.getters.getsliders;
    },
  },
};
</script>

<style lang="scss" scoped>
</style>