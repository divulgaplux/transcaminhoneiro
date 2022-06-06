<template>
  <div>
    <div class="bg-home d-flex justify-content-center align-items-center">
      <div>
        <mapa class="py-3" />
        <p class="text-center">Selecione um estado e veja os fretes disponíveis!</p>
      </div>
    </div>
    <div class="container">
      <h5 class="col-12 text-center my-4">
        <b>ÚLTIMOS FRETES DISPONÍVEIS:</b>
      </h5>
      <div class="list-group">
        <div v-for="item in items.data" :key="item.id">
          <router-link
            :to="`/cotacao/solicitar/${ item.id }`"
            class="list-group-item list-group-item-action"
          >
            <div class="d-flex w-100 justify-content-between">
              <div class="col-6">
                <p class="mb-1">
                  <strong>
                    <i class="fas fa-map-marker-alt px-1"></i>Origem:
                  </strong>
                  {{item.origin}}
                </p>
              </div>
              <div class="col-3">
                <p class="mb-1">
                  <strong>
                    <i class="fas fa-dollar-sign px-1"></i>Valor Sugerido:
                  </strong>
                  {{item.value_suggested}}
                </p>
              </div>
            </div>
            <div class="d-flex w-100 justify-content-between">
              <div class="col-6">
                <p class="mb-1">
                  <strong>
                    <i class="fas fa-map-marker-alt px-1"></i>Destino:
                  </strong>
                  {{item.destination}}
                </p>
              </div>
              <div class="col-3">
                <p class="mb-1" v-if="item.insurance_price == undefined">
                  <strong>
                    <i class="fas fa-dollar-sign px-1"></i>Valor do Seguro:
                  </strong>Não possui
                </p>
                <p class="mb-1" v-else>
                  <strong>
                    <i class="fas fa-dollar-sign px-1"></i>Valor do Seguro:
                  </strong>
                  {{item.insurance_price}}
                </p>
              </div>
            </div>
            <div class="d-flex w-100 justify-content-between">
              <div class="col-6">
                <p class="mb-1">
                  <strong>
                    <i class="fas fa-road px-1"></i>Distância:
                  </strong>
                  {{item.distance}} km
                </p>
              </div>
              <div class="col-3">
                <p class="mb-1">
                  <strong>
                    <i class="fas fa-truck-moving px-1"></i>Veículo:
                  </strong>
                  <a v-if="item.truck.typetruck == 'CRT'">Carreta</a>
                  <a v-if="item.truck.typetruck == 'CLS'">Carreta LS</a>
                  <a v-if="item.truck.typetruck == 'VDL'">Vanderléia</a>
                  <a v-if="item.truck.typetruck == 'BRT'">Bitrem</a>
                  <a v-if="item.truck.typetruck == 'RTM'">Rodotrem</a>
                  <a v-if="item.truck.typetruck == 'TCK'">Truck</a>
                  <a v-if="item.truck.typetruck == 'BTK'">Bitruck</a>
                  <a v-if="item.truck.typetruck == 'VLC'">VLC</a>
                  <a v-if="item.truck.typetruck == 'TPQ'">3/4</a>
                  <a v-if="item.truck.typetruck == 'TRC'">Toco</a>
                </p>
              </div>
            </div>
            <div class="d-flex justify-content-center w-100 px-4">
              <button type="button" class="btn btn-outline-primary">ENVIE A SUA SOLICITAÇÃO</button>
            </div>
          </router-link>
          <br />
        </div>
        <div class="d-flex w-100 justify-content-center">
          <pagination
            :data="items"
            @pagination-change-page="load"
            :limit="5"
            align="right"
            size="small"
          />
        </div>
      </div>
    </div>
    <div class="d-flex justify-content-center py-3">
      <a href="/cotacao" class="btn btn-trans">CONFIRA TODOS OS FRETES DISPONÍVEIS</a>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import Mapa from "./../general/Mapa";

export default {
  data() {
    return {
      items: {}
    };
  },
  components: {
    mapa: Mapa
  },
  methods: {
    load: function() {
      axios.get("/api/shippings").then(res => {
        this.items = res.data;
      });
    }
  },
  computed: {
    ...mapGetters({
      user: "getCurrentUser",
      isLogged: "isLogged"
    })
  },
  mounted() {
    this.load();
  }
};
</script>
