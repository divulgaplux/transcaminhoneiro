<template>
  <div class="col-12 py-5">
    <div class="col-12 alert alert-danger text-center" role="alert" v-if="!isLogged">
      PARA SOLICITAR UM FRETE É NECESSÁRIO ESTAR LOGADO!
      <router-link to="/entrar">CLIQUIE AQUI</router-link>
    </div>

    <div class="card">
      <div class="card-header">
        <h2>Detalhes do Frete - {{form.client}}</h2>
      </div>
      <div class="card-body">
        <div class="list-group py-2">
          <div class="d-flex w-100 justify-content-between">
            <div class="col-5">
              <p class="mb-1">
                <strong>
                  <i class="fas fa-map-marker-alt px-1"></i>Origem:
                </strong>
                {{form.origin}}
              </p>
            </div>
            <div class="col-4">
              <p class="mb-1" v-if="form.company_truck_id == undefined">
                <strong>
                  <i class="fas fa-building px-1"></i>Empresa:
                </strong>Aguadando Solicitação
              </p>
              <p class="mb-1" v-else>
                <strong>
                  <i class="fas fa-building px-1"></i>Empresa:
                </strong>
                {{form.company_truck_id}}
              </p>
            </div>

            <div class="col-4">
              <p class="mb-1">
                <strong>
                  <i class="fas fa-dollar-sign px-1"></i>Valor Sugerido:
                </strong>
                {{form.value_suggested}}
              </p>
            </div>
          </div>

          <div class="d-flex w-100 justify-content-between">
            <div class="col-5">
              <p class="mb-1">
                <strong>
                  <i class="fas fa-map-marker-alt px-1"></i>Destino:
                </strong>
                {{form.destination}}
              </p>
            </div>
            <!-- <div class="col-4">
              <p class="mb-1">
                <strong>
                  <i class="fas fa-user px-1"></i>Cliente:
                </strong>
                {{form.client}}
              </p>
            </div> -->
            <div class="col-4">
              <p class="mb-1">
                <strong>
                  <i class="fas fa-phone-alt px-1"></i>Celular:
                </strong>
                {{form.cellphone}}
              </p>
            </div>

            <div class="col-4">
              <p class="mb-1" v-if="form.insurance_price == undefined">
                <strong>
                  <i class="fas fa-dollar-sign px-1"></i>Seguro:
                </strong>Não possui Seguro
              </p>
              <p class="mb-1" v-else>
                <strong>
                  <i class="fas fa-dollar-sign px-1"></i>Seguro:
                </strong>
                {{form.insurance_price}}
              </p>
            </div>
          </div>

          <div class="d-flex w-100 justify-content-between">
            <div class="col-4">
              <p class="mb-1">
                <strong>
                  <i class="fas fa-road px-1"></i>Distância:
                </strong>
                {{form.distance}} km
              </p>
            </div>

            <div class="col-3">
              <p class="mb-1">
                <strong>
                  <i class="fas fa-phone-alt px-1"></i>Telefone:
                </strong>
                {{form.telephone}}
              </p>
            </div>
            <div class="col-3">
              <p class="mb-1">
                <strong>
                  <i class="fas fa-envelope px-1"></i>E-mail:
                </strong>
                {{form.email}}
              </p>
            </div>
          </div>
          <div class="col-4">
            <p class="mb-1">
              <strong>
                <i class="fas fa-balance-scale-right px-1"></i>Peso:
              </strong>
              {{form.weight}} kg
            </p>
          </div>
        </div>
      </div>
    </div>
    <div>
      <div v-if="isLogged">
        <request-price />
      </div>
      <div class="text-center">
        <h3>Cotações Enviadas Para Esse Frete:</h3>
        <list-request :cotation="$route.params.id" />
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import RequestPrice from "./../../components/register/Request";
import ListRequest from "./../../components/list/Request";
export default {
  props: {
    cotation: {
      required: true
    }
  },
  components: {
    "request-price": RequestPrice,
    "list-request": ListRequest
  },
  computed: {
    ...mapGetters({
      user: "getCurrentUser",
      isLogged: "isLogged"
    })
  },
  data() {
    return {
      form: new Form({
        id: undefined,
        truck_id: undefined,
        client: undefined,
        receiver: undefined,
        origin: undefined,
        destination: undefined,
        email: undefined,
        cellphone: undefined,
        telephone: undefined,
        weight: undefined,
        value_suggested: undefined,
        insurance_price: undefined,
        distance: undefined,
        company_truck_id: undefined,
        status: undefined,
        have_insurance: undefined,
        is_actived: true
      })
    };
  },

  methods: {
    loadprice: function() {
      axios.get(`/api/shippings/${this.cotation}`).then(res => {
        this.form.fill(res.data.data);
      });
    }
  },

  mounted() {
    this.loadprice();
  }
};
</script>
