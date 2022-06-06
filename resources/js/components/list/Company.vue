<template>
  <div>
    <div class="px-4 py-4 d-flex justify-content-between">
      <h5>
        <strong>Minhas Empresas</strong>
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
        <!-- <th>N°</th> -->
        <th>NOME</th>
        <!-- <th>NOME FANTASIA</th> -->
        <th>CNPJ/CPF</th>
        <th>E-MAIL</th>
        <th>TELEFONE</th>
        <th>CELULAR</th>
        <th>ENDEREÇO</th>
        <th>NÚMERO</th>
        <th>BAIRRO</th>
        <th>CIDADE</th>
        <th>ESTADO</th>
        <!-- <th>PAÍS</th> -->
        <th></th>
      </thead>
      <tbody>
        <tr v-for="item in items.data" :key="item.id">
          <!-- <td>{{item.id}}</td> -->
          <td>{{item.corporative_name}}</td>
          <!--<td>{{item.fantasy_name}}</td> -->
          <td>{{item.documentation}}</td>
          <td>{{item.email}}</td>
          <td>{{item.phone}}</td>
          <td>{{item.cellphone}}</td>
          <td>{{item.adress}}</td>
          <td>{{item.number}}</td>
          <td>{{item.neighborhood}}</td>
          <td>{{item.city}}</td>
          <td>{{item.state}}</td>
          <!-- <td>{{item.country}}</td> -->
          <td class="text-right">
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
        .get("/api/companies", {
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

