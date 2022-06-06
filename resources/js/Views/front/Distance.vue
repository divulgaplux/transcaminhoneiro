<template>
  <div class="py-4 px-4">
    <div class="row col-12">
      <route-distance/> 
    </div>
  </div>
</template>

<script>

import Distance from './../../components/home/Distance'

export default {
  components: {
    "route-distance": Distance
  },
  data () {
    return {
      isLoading: false,
    }
  },
}
</script>
