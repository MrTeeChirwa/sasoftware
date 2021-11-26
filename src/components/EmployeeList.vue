<template>
  <div>
    <div class="container">
      <div class="row" v-if="!hasEmployees">
        <div class="d-flex justify-content-center">
          <div class="icon">
            <img src="../assets/images/Icon.png" class="img-fluid" />
          </div>
        </div>
      </div>

      <div v-else>
        <div class="row" v-for="(employee, index) in employees" :key="index">
          <div class="col-sm-12 col-lg-12">
            <div class="employee-card">
              <div class="employer-container">
                <div class="employee-counter">{{ index + 1 }}</div>
                <p>{{ employee.firstName }}</p>
                <p>{{ employee.lastName }}</p>
                <p>{{ employee.contactNumber }}</p>
                <a href="javascript:void(0);"
                  ><i
                    class="fa fa-pen fa-lg edit-employee"
                    data-toggle="modal"
                    :data-target="'#editemployee-' + index"
                  ></i
                ></a>
              </div>
            </div>
          </div>
          <EditEmployeeModal
            :editEmployee="employee"
            :employeeIndexPos="index"
          />
        </div>
      </div>
    </div>
    <AddEmployeeModal @checkState="checkEmployees()" />
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import AddEmployeeModal from "./AddEmployeeModal.vue";
import EditEmployeeModal from "./EditEmployeeModal.vue";

export default {
  name: "EmployerList",
  components: {
    AddEmployeeModal,
    EditEmployeeModal,
  },
  mounted() {
    this.employees = this.getEmployees;

    this.$root.$on("searchKeyword", (param) => {
      if (param.filterType == "yearofbirth" && param.searchKeyword !== null) {
        this.employee = this.getEmployees.filter((employee) => {
          return employee.date == param.searchKeyword;
        });
        this.employees = this.employee;
      }

      if (
        param.filterType == "skill" &&
        param.searchKeyword !== null &&
        param.searchKeyword !== " "
      ) {
        this.employee = this.getEmployees.filter((employee) =>
          employee.skills.some((skills) => skills.skill == param.searchKeyword)
        );
        this.employees = this.employee;
      }

      if (param.searchKeyword === null || param.searchKeyword.length === 0) {
        this.employees = this.getEmployees;
      }
    });
  },
  data() {
    return {
      employees: [],
      employee: null,
    };
  },
  computed: {
    ...mapGetters(["getEmployees"]),
    hasEmployees: function () {
      return this.employees.length > 0;
    },
  },
  watch: {},
  methods: {
    checkEmployees() {
      if (this.getEmployees.length > 0) {
        this.employees = this.getEmployees;
      }
    },
  },
};
</script>
