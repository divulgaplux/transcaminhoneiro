<template>
  <div>
    <div class="px-4 py-4 d-flex justify-content-between">
      <h5>
        <strong>Cliente</strong>
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
        <th>EMPERESA</th>
        <th>NOME</th>
        <th>CPF</th>
        <th>RG</th>
        <th>CNH</th>
        <th>ESTADO CNH</th>
        <th></th>
      </thead>
      <tbody>
        <tr v-for="item in items.data" :key="item.id">
          <td>{{item.company.corporative_name}}</td>
          <td>{{item.name}}</td>
          <td>{{item.cpf}}</td>
          <td>{{item.rg}}</td>
          <td>{{item.cnh}}</td>
          <td>{{item.cnh_state}}</td>
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
        .get("/api/clients", {
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

