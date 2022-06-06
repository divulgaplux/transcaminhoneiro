<template>
  <div class="container py-5">
    <div class="bar-price">
      <nav class="navbar navbar-expand-lg">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <div class="btn-group">
            <button
              type="button"
              class="btn btn-secundary dropdown-toggle"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >BUSCA PERSONALIZADA</button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">MAIS RECENTES</a>
              <a class="dropdown-item" href="#">MAIS ANTIGOS</a>
              <a class="dropdown-item" href="#">COM MAIS SOLICITAÇÕES</a>
            </div>
          </div>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input
            class="form-control mr-sm-2"
            type="search"
            placeholder="Buscar"
            aria-label="Search"
          />
          <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Procurar</button>
        </form>
      </nav>
    </div>
    <div class="row py-3" id="row-main">
      <!-- # INÍCIO DA BARRA LATERAL -->
      <div class="col-md-3 sidebar-prices" id="sidebar">
        <div class="position-sticky sidebar-fixed">
          <div class="d-flex w-100 justify-content-center">
            <div class="mr-md-2 py-4">
              <button
                type="button"
                class="btn btn-price"
                data-toggle="modal"
                data-target="#priceModal"
              >SOLICITE UM FRETE</button>
            </div>
          </div>
          <div class="py-2 d-flex w-100 justify-content-center">
            <i class="fas fa-filter"></i>
            <div class="px-2">
              <strong>FILTROS</strong>
            </div>
          </div>
          <div class="py-2 px-4 d-flex w-100 justify-content-start">
            <i class="fas fa-route"></i>
            <div class="px-2">LOCALIZAÇÃO:</div>
          </div>
          <div class="col-12 py-2 d-flex justify-content-between">
            <div>
              <select class="form-control">
                <option :value="undefined">
                  <small>ORIGEM</small>
                </option>
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amapá</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espirito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MT">Mato Grosso</option>
                <option value="MG">Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <option value="SE">Sergipe</option>
                <option value="TO">Tocantins</option>
              </select>
            </div>
            <div class="px-1">
              <select class="form-control">
                <option :value="undefined">
                  <small>DESTINO</small>
                </option>
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amapá</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espirito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MT">Mato Grosso</option>
                <option value="MG">Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <option value="SE">Sergipe</option>
                <option value="TO">Tocantins</option>
              </select>
            </div>
          </div>
          <div class="py-2 px-4 d-flex w-100 justify-content-start">
            <i class="fas fa-truck"></i>
            <div class="px-2">CAMINHÃO:</div>
          </div>
          <div class="col-12 py-2">
            <div class="px-1">
              <select class="form-control col">
                <option :value="undefined">
                  <small>TIPO DE CAMINHÃO</small>
                </option>
                <option value="CRT">Carreta</option>
                <option value="CLS">Carreta LS</option>
                <option value="VDL">Vanderléia</option>
                <option value="BRT">Bitrem</option>
                <option value="RTM">Rodotrem</option>
                <option value="TCK">Truck</option>
                <option value="BTK">Bitruck</option>
                <option value="VLC">VLC</option>
                <option value="TPQ">3/4</option>
                <option value="TRC">Toco</option>
              </select>
            </div>
          </div>
          <div class="py-2 px-4 d-flex w-100 justify-content-start">
            <i class="fas fa-calendar-alt"></i>
            <div class="px-2">DATA:</div>
          </div>
          <div class="col-12 py-2 d-flex justify-content-between">
            <div>
              <select class="form-control">
                <option :value="undefined">
                  <small>INÍCIO</small>
                </option>
                <option value="AC">Acre</option>
              </select>
            </div>
            <div class="px-1">
              <select class="form-control">
                <option :value="undefined">
                  <small>FINAL</small>
                </option>
                <option value="0">0</option>
              </select>
            </div>
          </div>
          <div class="py-2 px-4 d-flex w-100 justify-content-start">
            <i class="fas fa-hand-holding-usd"></i>
            <div class="px-2">VALOR:</div>
          </div>
          <div class="col-12 py-2 d-flex justify-content-center">
            <input type="range" min="5" max="10" step="0.01" />
          </div>
          <br />
          <div class="col-12 d-flex justify-content-center">
            <a class="btn btn-outline-primary" href="#">
              <i class="fa fa-search"></i>
              PROCURAR
            </a>
          </div>
        </div>
      </div>

      <!-- # INÍCIO DO CONTEÚDO -->
      <div class="col-md-9 py-4" id="content">
        <div class="px-2 col-12">
          <div class="d-flex justify-content-between">
            <h5>
              <div class="py-2">
                <strong>
                  <i class="fas fa-truck"></i> FRETES
                </strong>
              </div>
            </h5>
            <pagination
              :data="items"
              @pagination-change-page="load"
              :limit="5"
              align="right"
              size="small"
            />
            <select
              class="col-1 custom-select custom-select form-control form-control-sm"
              aria-controls="basic-laratable"
              id="inputGroupSelect01"
              @change="load"
              v-model="numberPagination"
            >
              <option value="6">6</option>
              <option value="12">12</option>
              <option value="24">24</option>
              <option value="48">48</option>
            </select>
          </div>
        </div>
        <div class="list-group">
          <div v-for="item in items.data" :key="item.id">
            <router-link
              :to="`/cotacao/solicitar/${ item.id }`"
              class="list-group-item list-group-item-action"
            >
              <div class="d-flex w-100 justify-content-between">
                <div class="col-3">
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
                      <i class="fas fa-map-marker-alt px-1"></i>E-mail:
                    </strong>
                    {{item.email}}
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
                <div class="col-3">
                  <p class="mb-1">
                    <strong>
                      <i class="fas fa-map-marker-alt px-1"></i>Destino:
                    </strong>
                    {{item.destination}}
                  </p>
                </div>
                <div class="col-3">
                  <p class="mb-1">
                    <strong>
                      <i class="fas fa-map-marker-alt px-1"></i>Celular:
                    </strong>
                    {{item.cellphone}}
                  </p>
                </div>
                <div class="col-3">
                  <p class="mb-1" v-if="item.insurance_price == undefined">
                    <strong>
                      <i class="fas fa-dollar-sign px-1"></i>Seguro:
                    </strong>Não possui
                  </p>
                  <p class="mb-1" v-else>
                    <strong>
                      <i class="fas fa-dollar-sign px-1"></i>Seguro:
                    </strong>
                    {{item.insurance_price}}
                  </p>
                </div>
              </div>
              <div class="d-flex w-100 justify-content-between">
                <div class="col-3">
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
                      <i class="fas fa-map-marker-alt px-1"></i>Telefone:
                    </strong>
                    {{item.telephone}}
                  </p>
                </div>
              <div class="col-3">
                <p class="mb-1">
                  <strong>
                    <i class="fas fa-balance-scale-right px-1"></i>Peso:
                  </strong>
                  {{item.weight}} kg
                </p>
              </div>
              </div>
              <div class="d-flex justify-content-center w-100 py-3">
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
    </div>
  </div>
</template>

<script>
import Mapa from "./../general/MapaSmall";

export default {
  data() {
    return {
      numberPagination: 12
    };
  },
  props: {
    items: {
      type: Object,
      required: true
    }
  },
  components: {
    mapa: Mapa
  },
  methods: {
    load: function(page = 1) {
      this.page = page;
      axios
        .get("/api/shippings", {
          params: {
            page: this.page,
            pg: this.numberPagination
          }
        })
        .then(res => {
          this.items = res.data;
        });
    },

    del: function(id) {
      this.$emit("del", id);
    },
    edit: function(id) {
      this.$emit("edit", id);
    },
    searchPrice: function() {
      if (this.search == "") this.origin = [];
      if (this.search.length < 5) return;

      axios
        .get("/api/shippings", {
          params: {
            search: this.search
          }
        })
        .then(res => {
          this.origin = res.data.data;
        })
        .catch(err => {
          console.error(err);
        });
    }
  }
};
</script>

