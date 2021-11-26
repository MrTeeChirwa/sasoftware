export var SassData = {
    data() {
        return {
             ApiUrl: 'http://localhost:8000/api'
        }
    },
    methods: {
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
          showError(error) {
            return this.$toastr.error(error, "", "");
          },
        addSkill() {
            this.employee.skills.push({
              skill: "",
              yearsExprience: "",
              seniorityRating: "",
            });
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
    }
}