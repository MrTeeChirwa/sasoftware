<template>
  <div>
    <div class="container">
      <div class="row align-items-center no-gutters">
        <div class="col-sm-12 col-lg-3">
          <h5>Employees</h5>
          <p>There are {{ getEmployees.length }} employees</p>
        </div>
        <div class="col-sm-12 col-lg-5">
          <input
            type="text"
            class="form-control employee-filter"
            placeholder="Search"
            v-model="searchKeyword"
          />
        </div>
        <div class="col-sm-12 col-lg-2">
          <ul>
            <li class="nav-bar_item dropdown">
              <a href="#">Filter by</a>
              <ul class="filterby">
                <li class="drop-item">
                  <a
                    href="javascript:void(0);"
                    v-on:click="filterBy('yearofbirth')"
                    >Year of birth</a
                  >
                </li>
                <li class="drop-item">
                  <a href="javascript:void(0);" v-on:click="filterBy('skill')"
                    >Skill</a
                  >
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
            <p class="text-center">New employee</p>
          </span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
  name: "Navigation",
  computed: {
    ...mapGetters(["getEmployees"]),
  },
  data() {
    return {
      searchKeyword: "",
      filterType: null,
    };
  },
  methods: {
    showError(error) {
      return this.$toastr.error(error, "", "");
    },
    filterBy(filterType) {
      console.log(this.searchKeyword);
      this.filterType = filterType;
      if (this.filterType != null) {
        this.$root.$emit("searchKeyword", {
          filterType: this.filterType,
          searchKeyword: this.searchKeyword,
        });
      }
    },
  },
};
</script>
