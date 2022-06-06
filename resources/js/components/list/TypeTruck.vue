<template>
  <div>
    <div class="px-4 py-4 d-flex justify-content-between">
      <h5>
        <strong>Tipo de Caminhão</strong>
      </h5>
      <pagination
        :data="items"
        @pagination-change-page="load"
        :limit="5"
        align="right"
        size="small"
      />
    </div>
    <table class="table table-striped table-responsive-md table-sm">
      <thead>
        <tr>
          <!-- <th>N°</th> -->
          <!-- <th>DECRIÇÃO</th> -->
          <th>CAMINHÃO</th>
          <th>CARROÇERIA</th>
          <th>VOLUME</th>
          <th>EIXOS</th>
          <!--<th>Limite de Eixos</th>-->
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in items.data" :key="item.id">
          <!-- <td>{{item.id}}</td> -->
          <!--<td>{{item.description}}</td>-->
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
          <td v-if="item.bodywork == 'CCB'">Caçamba</td>
          <td v-if="item.bodywork == 'GDB'">Grade Baixa</td>
          <td v-if="item.bodywork == 'GNL'">Graneleiro</td>
          <td v-if="item.bodywork == 'PCH'">Prancha</td>
          <td v-if="item.bodywork == 'CVQ'">Cavaqueira</td>
          <td v-if="item.bodywork == 'BAU'">Baú</td>
          <td v-if="item.bodywork == 'BAF'">Baú Frigorífico</td>
          <td v-if="item.bodywork == 'SDR'">Sider</td>
          <td v-if="item.bodywork == 'BPC'">Bug Porta Container</td>
          <td v-if="item.bodywork == 'MNK'">Munk</td>
          <td v-if="item.bodywork == 'SLO'">Silo</td>
          <td v-if="item.bodywork == 'TNQ'">Tanque</td>
          <td v-if="item.bodywork == 'GLA'">Gaiola</td>
          <td v-if="item.bodywork == 'CGR'">Cegonheiro</td>
          <td v-if="item.bodywork == 'APC'">Apenas Cavalo</td>
          <td>{{item.volume}}</td>
          <td>{{item.axes}}</td>
          <!-- <td>{{item.limit}}</td> -->
          <td>
            <a
              @click.prevent="del( item.id )"
              class="btn btn-danger btn-sm fa fa-trash nav-icon"
              href="#"
            ></a>
            <a @click.prevent="edit( item.id )" class="btn btn-primary btn-sm nav-icon" href="#">
              <i class="fa fa-edit"></i>
            </a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  props: {
    items: {
      type: Object,
      required: true,
    },
  },
  methods: {
    del: function (id) {
      this.$emit("del", id);
    },
    edit: function (id) {
      this.$emit("edit", id);
    },
    load: function (page = 1) {
      this.page = page;
      axios
        .get("/api/trucks", {
          params: {
            page: this.page,
          },
        })
        .then((res) => {
          this.items = res.data;
        });
    },
  },
};
</script>

