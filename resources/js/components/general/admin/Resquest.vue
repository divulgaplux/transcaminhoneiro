<template>
  <div class="col-12">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>N°</th>
          <th>EMPRESA</th>
          <th>VALOR</th>
          <th>TEMPO DE CONCLUSÃO</th>
          <th>OBSERVAÇÕES</th>
          <th>DATA</th>
          <!-- <th></th> -->
        </tr>
      </thead>
      <tbody>
        <tr v-if="item.shipping_id == cotation" v-for="item in requests" :key="item.id">
          <td>{{item.id}}</td>
          <td>{{item.company.corporative_name}}</td>
          <td>{{item.value}}</td>
          <td>{{item.time_approximate}} Dias</td>
          <td>{{item.observation}}</td>
          <td>{{item.date}}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  props: {
    cotation: {
      required: true
    }
  },
  data() {
    return {
      requests: [],
      companies: [],
      items: {}
    };
  },

  methods: {
    load: function() {
      axios.get("/api/requests").then(res => {
        this.requests = res.data.data;
      });
    },
    loadCompany: function() {
      axios.get("/api/companies").then(res => {
        this.companies = res.data.data;
      });
    }
  },

  mounted() {
    this.load();
    this.loadCompany();
  }
};
</script>
