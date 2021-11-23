<template>
  <div class="input-group">
    <date-pick v-model="employee_date"> </date-pick>
    <div class="input-group-append">
      <button class="btn btn-secondary" type="button">
        <i class="fa fa-calendar"></i>
      </button>
    </div>
    <input type="hidden" name="employee_date" :value="employee_date" />
  </div>
</template>
<script>
import DatePick from "vue-date-pick";
import "vue-date-pick/dist/vueDatePick.css";

export default {
  components: { DatePick },
  props: ["date"],
  data() {
    return {
      employee_date: this.getEmployeeDate(),
    };
  },
  methods: {
    getEmployeeDate: function () {
      if (this.date) {
        return this.date;
      }
    },
  },
};
</script>

<style>
.vdpComponent.vdpWithInput > input {
  padding-right: 30px;
  padding-bottom: 4px;
  display: block;
  width: 100%;
  height: calc(1.5em + 0.75rem + 2px);
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  font-weight: 400;
  line-height: 1.5;
  color: #495057;
  background-color: #767070;
  background-clip: padding-box;
  border: 1px solid #767070;
  border-radius: 0.25rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  outline: none;
}
</style>
