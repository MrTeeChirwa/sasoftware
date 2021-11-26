<template>
  <div
    class="modal fade"
    tabindex="-1"
    role="dialog"
    :id="'editemployee-' + employeeIndexPos"
  >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <div class="employee-popuptitle">
            <h2>Edit employee</h2>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
        <div class="modal-body">
          <form id="edit-employee-form">
            <fieldset>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="first_name"> First name </label>
                    <input
                      type="text"
                      name="first_name"
                      v-model="editEmployee.firstName"
                      :class="
                        validationErrors.firstName
                          ? 'form-control is-invalid'
                          : 'form-control'
                      "
                    />
                  </div>
                </div>

                <div class="col-md-8">
                  <div class="form-group">
                    <label for="first_name"> Last name </label>
                    <input
                      type="text"
                      name="last_name"
                      v-model="editEmployee.lastName"
                      :class="
                        validationErrors.lastName
                          ? 'form-control is-invalid'
                          : 'form-control'
                      "
                    />
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="first_name"> Contact Number </label>
                    <input
                      type="tel"
                      name="contact_number"
                      v-model="editEmployee.contactNumber"
                      :class="
                        validationErrors.contactNumber
                          ? 'form-control is-invalid'
                          : 'form-control'
                      "
                    />
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="email_address"> Email address </label>
                    <input
                      type="email"
                      name="milestone_price"
                      v-model="editEmployee.emailAddress"
                      :class="
                        validationErrors.emailAddress
                          ? 'form-control is-invalid'
                          : 'form-control'
                      "
                    />
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="dob">Date of birth</label>
                    <div class="input-group">
                      <date-pick v-model="editEmployee.date"> </date-pick>
                      <div class="input-group-append">
                        <button class="btn btn-secondary" type="button">
                          <i class="fa fa-calendar"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="street_address">Street Address</label>
                    <input
                      type="text"
                      name="street_address"
                      v-model="editEmployee.streetAddress"
                      :class="
                        validationErrors.streetAddress
                          ? 'form-control is-invalid'
                          : 'form-control'
                      "
                    />
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="city"> City </label>
                    <input
                      type="text"
                      name="city"
                      v-model="editEmployee.city"
                      :class="
                        validationErrors.city
                          ? 'form-control is-invalid'
                          : 'form-control'
                      "
                    />
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="postal_code"> Postal code</label>
                    <input
                      type="text"
                      name="postal_code"
                      v-model="editEmployee.postalCode"
                      :class="
                        validationErrors.postalCode
                          ? 'form-control is-invalid'
                          : 'form-control'
                      "
                    />
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="country"> Country</label>
                    <input
                      type="text"
                      name="country"
                      v-model="editEmployee.country"
                      :class="
                        validationErrors.country
                          ? 'form-control is-invalid'
                          : 'form-control'
                      "
                    />
                  </div>
                </div>
              </div>

              <div
                class="row"
                v-for="(input, i) in editEmployee.skills"
                :key="i"
              >
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="skills"> Skill </label>
                    <input
                      type="text"
                      name="skill"
                      v-model="input.skill"
                      class="form-control"
                    />
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="yrs_exprience"> Years of exprience</label>
                    <input
                      type="text"
                      name="years_exprience"
                      class="form-control"
                      v-model="input.yearsExprience"
                    />
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="seniority_rating"> Seniority rating</label>
                    <input
                      type="text"
                      name="seniority_rating"
                      class="form-control"
                      v-model="input.seniorityRating"
                    />
                  </div>
                </div>

                <div class="col-md-1">
                  <div class="form-group">
                    <div class="employee-remove">
                      <a
                        href="javascript:void(0);"
                        v-on:click="addRemoveSkill(i)"
                        ><i class="fa fa-trash fa-lg"></i
                      ></a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <button
                      type="button"
                      class="btn add-new-skill"
                      v-on:click="addSkill()"
                    >
                      + Add new skill
                    </button>
                  </div>
                </div>
              </div>
            </fieldset>
          </form>
        </div>

        <div class="modal-footer">
          <span class="badge badge-pill badge-danger"
            ><a href="#" v-on:click="saveAddEmployee()">
              <i class="fa fa-plus-circle add-employee"> </i>
            </a>
            <p class="text-center add-employee-button">Save And Add Employee</p>
          </span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import DatePick from "vue-date-pick";
import "vue-date-pick/dist/vueDatePick.css";
import { mapActions } from "vuex";
import axios from "axios";

export default {
  name: "EditEmployeeModal",
  props: {
    editEmployee: {
      type: Object,
    },
    employeeIndexPos: {
      type: Number,
    },
  },
  components: {
    DatePick,
  },
  data() {
    return {
      employee: [],
      employees: [],
      validationErrors: [],
    };
  },
  methods: {
    ...mapActions(["addEmployee"]),
    addRemoveSkill(index) {
      if (this.employee.skills.length > 1) {
        this.employee.skills.splice(index, 1);
      }
    },
    generateId() {
      var randChars = "";
      var characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
      var charactersLength = characters.length;
      var randNum = Math.floor(1000 + Math.random() * 9000);

      for (var i = 0; i < 2; i++) {
        randChars += characters.charAt(
          Math.floor(Math.random() * charactersLength)
        );
      }
      return randChars + randNum;
    },
    addSkill() {
      this.employee.skills.push({
        skill: "",
        yearsExprience: "",
        seniorityRating: "",
      });
    },
    showError(error) {
      return this.$toastr.error(error, "", "");
    },
    saveAddEmployee() {
      if (this.employee.id != this.generateId()) {
        this.employee.id = this.generateId();

        axios
          .post(
            " http://localhost:8000/api/employee/storeOrUpdate",
            this.employee
          )
          .then((response) => {
            if (response.data.status) {
              this.validationErrors = [];
              return response.data.data;
            }
          })
          .then((response) => {
            this.addEmployee(response);
            this.resetEmployeeDataObj();
          })
          .then(() => {
            this.$emit("checkState");
          })
          .catch((error) => {
            this.validationErrors = error.response.data.errors;
            if (Object.entries(error.response.data.errors).length > 0) {
              this.showError(error.response.data.message);
            }
          });
      }
    },
    getEmployeeDate: function () {
      if (this.date) {
        return this.date;
      }
    },
    resetEmployeeDataObj() {
      this.employee.date = this.getEmployeeDate();
      this.employee.id = null;
      this.employee.firstName = null;
      this.employee.lastName = null;
      this.employee.contactNumber = null;
      this.employee.emailAddress = null;
      this.employee.streetAddress = null;
      this.employee.city = null;
      this.employee.postalCode = null;
      this.employee.country = null;
      this.employee.skills = [
        {
          skill: "",
          yearsExprience: "",
          seniorityRating: "",
        },
      ];
    },
  },
};
</script>
