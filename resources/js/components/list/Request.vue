<template>
  <div class="col-12">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>EMPRESA</th>
          <th>DATA</th>
          <th>VALOR</th>
          <th>OBSERVAÇÕES</th>
        </tr>
      </thead>
      <tbody>
        <tr v-if="item.shipping_id == cotation" v-for="item in requests" :key="item.id">
          <td>{{item.company.corporative_name}}</td>
          <td>{{item.date}}</td>
          <td>R$ {{item.value | formatMoney}}</td>
          <td v-if="item.observation == undefined">Nenhuma Observação</td>
          <td v-else>{{item.observation}}</td>
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
      items: {}
    };
  },

  methods: {
    load: function() {
      axios.get("/api/requests").then(res => {
        this.requests = res.data.data;
      });
    }
  },
  mounted() {
    this.load();
  }
};
</script>
