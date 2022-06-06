<template>
  <div class="col-12">
    <h1>Detalhes da Cotação</h1>
    <form @submit.prevent="save">
      <div class="row">
        <div class="col-6">
          <label for="ImputOrigin">Origem</label>
          <input type="text" class="form-control" v-model="form.origin" />
        </div>

        <div class="col-6">
          <label for="Imputdestination">Destino</label>
          <input type="text" class="form-control" v-model="form.destination" />
        </div>

        <div class="col-4">
          <label for="Imputemail">E-mail</label>
          <input type="number" class="form-control" v-model="form.email" />
        </div>

        <div class="col-4">
          <label for="Imputcellphone">Celular</label>
          <input
            type="text"
            v-mask="[
                        '(##) #####-####',
                        '(##) ####-####'
                      ]"
            class="form-control"
            id="phone"
            v-model="form.cellphone"
          />
        </div>

        <div class="col-4">
          <label for="Imputtelephone">Telefone</label>
          <input
            type="text"
            v-mask="[
                        '(##) #####-####',
                        '(##) ####-####'
                      ]"
            class="form-control"
            id="phone"
            v-model="form.telephone"
          />
        </div>

        <div class="col-4">
          <label for="ImputDistance">Distância</label>
          <span class="badge badge-light">Km</span>
          <input type="number" class="form-control" v-model="form.distance" />
        </div>

        <div class="col-4">
          <label for="InputWeight">Peso</label>
          <input type="number" class="form-control" v-model="form.weight" />
        </div>

        <!--         <div class="col-4">
          <label for="ImputCliente">Cliente</label>
          <input type="text" class="form-control" v-model="form.client" />
        </div>-->

        <div class="col-4">
          <label for="Imput">Valor do Seguro</label>
          <span class="badge badge-light">R$</span>
          <input type="number" class="form-control" v-model="form.insurance_price" />
          <p v-if="form.insurance_price == undefined">
            <small>Não Possui Seguro? Para adicionar digite o valor no campo acima.</small>
          </p>
        </div>

        <!--         <div class="col-4">
          <label for="InputDescription">Tipo de Caminhão</label>
          <select class="form-control" type="text" v-model="form.truck_id">
            <option v-for="item in trucks" :key="item.id" :value="item.id">
              <td v-if="item.typetruck == 'CRT'">Carreta</td>
              <td v-if="item.typetruck == 'CLS'">Carreta LS</td>
              <td v-if="item.typetruck == 'VDL'">Vanderléia</td>
              <td v-if="item.typetruck == 'BRT'">Bitrem</td>
              <td v-if="item.typetruck == 'RTM'">Rodotrem</td>
              <td v-if="item.typetruck == 'TCK'">Truck</td>
              <td v-if="item.typetruck == 'BTK'">Bitruck</td>
              <td v-if="item.typetruck == 'VLC'">VLC</td>
              <td v-if="item.typetruck == 'TPQ'">3/4</td>
              <td v-if="item.typetruck == 'TRC'">Toco</td>
            </option>
          </select>
        </div>-->

        <div class="col-4">
          <label for="Imput">Valor Sugerido</label>
          <span class="badge badge-light">R$</span>
          <input type="number" class="form-control" v-model="form.value_suggested" />
        </div>

        <div class="px-2 py-3">
          <!-- <h3>Solicitações desse frete: {{form.request_id}}</h3> -->
        </div>

        <div class="col-12">
          <label for="InputDescription">Solicitações Desse Frete</label>
          <select class="form-control" type="text" v-model="form.request_id">
            <option
              v-if="item.shipping_id == cotation"
              v-for="item in requests"
              :key="item.id"
              :value="item.id"
            >
              <p>
                N°: {{item.id}} -
                Empresa: {{item.company_id}} -
                <!-- Data: {{item.date}} -->
                Valor: {{item.value}} -
                Tempo de Conclusão: {{item.time_approximate}}
                <!-- Observação:{{item.observation}} -->
              </p>
            </option>
          </select>
        </div>
        <div class="py-3 col-12 d-flex justify-content-between">
          <div class="col-3">
            <button type="submit" class="btn btn-primary form-control">Alterar</button>
          </div>
          <div class="col-3">
            <button type="button" class="btn btn-danger form-control" data-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </form>
    <div>
      <h3>Solicitações desse frete</h3>
      <list-request :cotation="$route.params.id" />
    </div>
  </div>
</template>

<script>
import ListRequest from "./../../components/general/admin/Resquest";
export default {
  props: {
    cotation: {
      required: true,
    },
  },
  data() {
    return {
      trucks: [],
      requests: [],
      form: new Form({
        id: undefined,
        truck_id: undefined,
        client: undefined,
        receiver: undefined,
        origin: undefined,
        destination: undefined,
        email: undefined,
        telephone: undefined,
        cellphone: undefined,
        weight: undefined,
        value_suggested: undefined,
        insurance_price: undefined,
        distance: undefined,
        company_truck_id: undefined,
        status: undefined,
        have_insurance: undefined,
        request_id: undefined,
        is_actived: true,
      }),
    };
  },

  components: {
    "list-request": ListRequest,
  },

  methods: {
    load: function () {
      axios.get(`/api/shippings/${this.cotation}`).then((res) => {
        this.form.fill(res.data.data);
      });
    },

    loadTruck: function () {
      axios
        .get("/api/trucks")
        .then((res) => {
          this.trucks = res.data.data;
        })
        .catch((err) => {
          console.error(err);
        });
    },

    loadRequest: function () {
      axios.get("/api/requests").then((res) => {
        this.requests = res.data.data;
      });
    },

    save: function () {
      this.form
        .post("/api/shippings")
        .then((res) => {
          Swal.fire({
            icon: "success",
            title: "Alterações Salvas!",
          });
          this.load();
        })
        .catch((err) => {
          console.error(err);
          Swal.fire({
            icon: "error",
            title: "Opss!",
            text: "Alguma coisa deu errado, tente novamente mais tarde",
          });
        })
        .then(() => {
          this.form.reset();
        });
    },
  },

  mounted() {
    this.load();
    this.loadTruck();
    this.loadRequest();
  },
};
</script>
