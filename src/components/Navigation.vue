<template>
  <div>
    <div class="container">
      <div class="row align-items-center no-gutters">
        <div class="col-sm-12 col-lg-3">
          <h5>Employees</h5>
          <p>There are 4 employees</p>
        </div>
        <div class="col-sm-12 col-lg-5">
          <input
            type="text"
            class="form-control employee-filter"
            placeholder="Search"
          />
        </div>
        <div class="col-sm-12 col-lg-2">
          <ul>
            <li class="nav-bar_item dropdown">
              <a href="#">Filter by</a>
              <ul class="filterby">
                <li class="drop-item">
                  <a href="javascript:void(0);">First name</a>
                </li>
                <li class="drop-item">
                  <a href="javascript:void(0);">Last name</a>
                </li>
                <li class="drop-item">
                  <a href="javascript:void(0);">Contact number</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <div class="col-sm-12 col-lg-2">
          <span class="badge badge-pill badge-danger"
            ><a href="#"
              ><i
                class="fa fa-plus-circle add-employee"
                data-toggle="modal"
                data-target="#add-employee"
              ></i
            ></a>
            <p class="text-center">New employee</p></span
          >
        </div>

        <div class="modal fade" tabindex="-1" role="dialog" id="add-employee">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <div class="employee-popuptitle">
                  <h2>New employee</h2>
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
                <form id="add-employee-form">
                  <fieldset>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="first_name"> First name </label>
                          <input
                            type="text"
                            name="first_name"
                            class="form-control"
                          />
                        </div>
                      </div>

                      <div class="col-md-8">
                        <div class="form-group">
                          <label for="first_name"> Last name </label>
                          <input
                            type="text"
                            name="last_name"
                            class="form-control"
                          />
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="first_name"> Contact Number </label>
                          <input
                            type="text"
                            name="contact_number"
                            class="form-control"
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
                            class="form-control"
                          />
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="dob">Date of birth</label>
                          <date :date="''"> </date>
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
                            class="form-control"
                          />
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="city"> City </label>
                          <input type="text" name="city" class="form-control" />
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="postal_code"> Postal code</label>
                          <input
                            type="text"
                            name="postal_code"
                            class="form-control"
                          />
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="country"> Country</label>
                          <input
                            type="text"
                            name="country"
                            class="form-control"
                          />
                        </div>
                      </div>
                    </div>

                    <div class="row" v-for="(input, i) in inputs" :key="i">
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
                          <label for="seniority_rating">
                            Seniority rating</label
                          >
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
                            v-on:click="addAddSkill()"
                          >
                            + Add new skill
                          </button>
                        </div>
                      </div>
                    </div>
                  </fieldset>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Date from "./Date.vue";

export default {
  name: "Navigation",
  props: {
    msg: String,
  },
  components: {
    Date,
  },
  data() {
    return {
      inputs: [
        {
          skill: "",
          yearsExprience: "",
          seniorityRating: "",
        },
      ],
    };
  },
  methods: {
    addRemoveSkill(index) {
      if (this.inputs.length > 1) {
        this.inputs.splice(index, 1);
      }
    },
    addAddSkill() {
      this.inputs.push({
        skill: "",
        yearsExprience: "",
        seniorityRating: "",
      });
    },
  },
};
</script>
