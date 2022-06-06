<template>
  <div class="col-12 mt-2">
    <label v-if="label != undefined">{{ label }}</label>
    <input type="text" v-model="search" class="form-control" @change="loadBingAPI" />
    <div class="list-group position-absolute w-80" v-if="items.length > 0" style="z-index: 99999">
      <a
        href="#"
        class="list-group-item list-group-item-action"
        v-for="item,i in items"
        :key="i"
        @click.prevent="setValue( item.address.formattedAddress )"
      >
        <span v-if=" item.__type === 'LocalBusiness' ">{{ item.name }} -</span>
        {{ item.address.formattedAddress }}
      </a>
    </div>
    <div class="col-12 text-center" v-if="isLoadding">
      <i class="fas fa-2x fa-spin fa-spinner"></i>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    label: {
      required: false,
      type: String
    }
  },
  data() {
    return {
      search: undefined,
      items: [],
      isLoadding: false,
      userLocation: undefined
    };
  },
  methods: {
    setValue: function(value) {
      this.search = value;
      this.items = [];
      this.$emit("returnSearch", value);
    },

    loadGoogleAPI: function() {
      this.isLoadding = true;
      this.items = [];
    },

    loadBingAPI: function() {
      this.isLoadding = true;
      this.items = [];
      axios
        .get(
          "https://cors-anywhere.herokuapp.com/https://dev.virtualearth.net/REST/v1/Autosuggest",
          {
            params: {
              query: this.search,
              userLocation: this.userLocation,
              countryFilter: "BR",
              userRegion: "BR",
              culture: "pt-BR",
              maxResults: 10,
              // includeEntityTypes: 'Address',
              key:
                "AtIij0WGH10eSo9Yetc05yNlVl2feV6jZ6tg93d30V5_E1KKIqDLC9ZH8oHxWcdh"
            }
          }
        )
        .then(res => {
          if (res.data.statusCode === 200) {
            let values = res.data.resourceSets[0].resources[0].value;
            if (values) {
              values.forEach(item => {
                this.items.push(item);
              });
            }
          }
        })
        .catch(err => {
          console.error(err);
        })
        .then(() => {
          this.isLoadding = false;
        });
    }
  },
  created() {
    navigator.geolocation.getCurrentPosition(
      pos => {
        this.userLocation = `${pos.coords.latitude},${pos.coords.longitude},${pos.coords.accuracy}`;
      },
      err => {
        console.error(err);
      },
      { maximumAge: 600000 }
    );
  }
};
// query=<user_prefix>&userLocation=<lat,long,confidence_radius>&userCircularMapView=<lat,long,radius>&userMapView=<nw_lat,nw_long,se_lat,se_long>&maxResults=<max_results>&includeEntityTypes=<Place,Address,Business>&culture=<culture_code>&userRegion=<country_code>&countryFilter=<country_code_or_none>&key=<BingMapKey>
</script>

