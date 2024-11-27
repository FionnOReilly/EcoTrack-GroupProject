<template>
  <div class="grid-container">
    <form @submit.prevent="submitForm" id="wasteLogForm" class="wasteLogForm">
      <fieldset id="fieldset1">
        <div id="fieldset2">
          <legend>Waste Logging</legend>

          <p>
            <label for="wasteType" class="wasteLabel">Waste Type: </label>
            <select id="wasteType" name="wasteType" v-model="wastelog.type">
              <option value="" disabled selected>Select a Type</option>
              <option value="general">General Waste</option>
              <option value="recyclable">Recyclable Materials</option>
              <option value="glass">Glass Waste</option>
              <option value="organic">Organic Waste</option>
            </select>
            <span id="error1"></span>
          </p>


          <p>
            <label for="bagSize" class="wasteLabel">Bag Size: </label>
            <select id="bagSize" name="bagSize" v-model="wastelog.size">
              <option value=""  disabled selected>Select a Size</option>
              <option value="Small Bag (25L)">Small Bag (25L)</option>
              <option value="Medium Bag(50L)">Medium Bag (50L)</option>
              <option value="Large Bag(20L)">Large Bag (20L)</option>
              <option value="Large Bag(100L)">Large Bag (100L)</option>
            </select>
            <span id="error2"></span>
          </p>

          <p>
            <label for="isRecyclable" class="wasteLabel">Recyclable: </label>
            <select id="isRecyclable" name="recyclable" v-model="wastelog.recyclable">
              <option value="" disabled selected>Select</option>
              <option value="Yes">Yes</option>
              <option value="No">No</option>
            </select>
            <span id="error3"></span>
          </p>


          <p>
            <label for="dateOfDisposal" class="wasteLabel">Date of Disposal: </label>
            <input type="date" name="dateOfDisposal" id="dateOfDisposal" v-model="wastelog.date">
            <span id="error4"></span>
          </p>


          <div class="buttonContainer">
            <input type="submit" value="Submit" class="contactButton" id="primaryButton">
            <input type="reset" value="Reset" class="contactButton" id="secondaryButton">
          </div>
        </div>
      </fieldset>
    </form>

    <div id="loggedWaste">
      <h4>Logged Waste Entries</h4>
      <table>
        <tr>
          <th>Waste Type</th>
          <th>Bag Size</th>
          <th>Recyclable</th>
          <th>Date of Disposal</th>
        </tr>
        <tr v-for="log in wasteLogs" :key="log.id">
          <td>{{ log.waste_type }}</td>
          <td>{{ log.bag_size }}</td>
          <td>{{ log.is_recyclable}}</td>
          <td>{{ log.date_of_disposal }}</td>
        </tr>
      </table>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'WasteLogPage',
  data() {
    return {
      wastelog: {
        type: '',
        size: '',
        recyclable: '',
        date: '',
      },
      formErrors: {
        type: '',
        size: '',
        recyclable: '',
        date: '',
      },
      wasteLogs: [],
    };
  },
  methods: {
    async submitForm() {
      document.getElementById("error1").innerHTML = "";
      document.getElementById("error2").innerHTML = "";
      document.getElementById("error3").innerHTML = "";
      document.getElementById("error4").innerHTML = "";

      if (this.wastelog.type === '' || this.wastelog.type === 'select') {
        document.getElementById("error1").innerHTML = "*Waste Type is required";
        return;
      }

      if (this.wastelog.size === '' || this.wastelog.size === 'select') {
        document.getElementById("error2").innerHTML = "*Bag Size is required";
        return;
      }

      if (this.wastelog.recyclable === '' || this.wastelog.recyclable === 'select') {
        document.getElementById("error3").innerHTML = "*Option is required";
        return;
      }

      if (this.wastelog.date === '') {
        document.getElementById("error4").innerHTML = "*Date of Disposal is required";
        return;
      }

      const wasteLogData = {
        type: this.wastelog.type,
        size: this.wastelog.size,
        recyclable: this.wastelog.recyclable,
        date: this.wastelog.date,
      };

      await axios.post('http://localhost:8081/EcoTrack-GroupProject/CI4-EcoTrack/public/addWasteLog', wasteLogData);
    },
    async getWasteLogs() {
        const response = await axios.get(
            'http://localhost:8081/EcoTrack-GroupProject/CI4-EcoTrack/public/wastelog');
               this.wasteLogs = response.data;

    },
  },
  mounted() {
    this.getWasteLogs();
  },
};
</script>



<style scoped>

span {
  color: red;
  font-size:16px;

}
.grid-container {
  display: grid;
  grid-template-columns: 100%;
  margin-bottom:15px;
}

#loggedWaste{

}

.contactButton:hover {
  border-radius: 20px;
}

#primaryButton:hover {
  background-color: #adffe7; 
}

#secondaryButton:hover {
  background-color: #fab3a1; 
}

form{
  width: 100%;
  padding: 20px;
}

fieldset,#loggedWaste {
  width: 100%;
  background-color: #D4E7E9;
  font-size:20px;
}


#fieldset1, fieldset,#loggedWaste {
  border: 5px solid #2D2828C6;
  border-radius: 20px;
}

label {
  padding: 10px;
  display: inline-block;
  font-weight: bold;
  text-align: right;
}

.error {
  color: #c21d1d;
  padding-left: 10px;
}

input[type="text"],select, input[type="date"] {
  display: inline-block;
  margin-left: 2em;
  margin-bottom: 2px;
  width:30%;
  padding:5px;
}

input[type="radio"]{
  margin-left:5%;
  margin-right:5px;
  padding:5px;
}

#service {
  display: inline-block;
  width: 26%;
  padding: 5px;
}

#fieldset1 legend,#loggedWaste h4 {
  padding: 3px;
  border-radius: 14.8px 11.8px 0 0;
  width: 100%;
  text-align: center;
  background-color: #71BAC1;
  font-weight: bold;
}

.buttonContainer {
  text-align: center;
  margin: 10px;
}

 #primaryButton, #secondaryButton {
  padding: 5px;
margin:5px;
  width: 7em;
  font-weight: bold;
  color: black;
}

#secondaryButton{
  background-color:#F79181;
}

#primaryButton{
  background-color: #3ED2AA
}

.contactButton {
  border: 4px solid #2D2828C6;
  border-radius: 10px;
}

/*---------- Table styling----------*/
#loggedWaste table {
  width: 100%;
}

#loggedWaste{
  border-radius:20px 20px 0 0 ;
}

#loggedWaste th,
#loggedWaste td {
  padding: 10px;
  text-align: center;
  border: 1px solid #2D2828C6;
}


#loggedWaste th {
  background-color: #71BAC1;
  color: #2D2828;
  font-weight: bold;
}

#loggedWaste tr {
  background-color: #FFFEEF; 
}

#loggedWaste tr:hover {
  background-color: #C8DFE0; 
}




/*Mobile view*/
@media only screen and (max-width: 767px) {
  .grid-container {
    grid-template-columns:repeat(5, 20%);
    grid-row-gap: 2em;
  }

  form ,#loggedWaste{
    margin: 0;
    grid-column: 1/6;
  }



  .error {
    display: block;
    margin-left: 39%;
  }

  #service {
    width: 39%;
  }

label{width:50%;margin-left:60px;text-align: left;display: block;}

  select,
  input[type="text"],
  input[type="date"] {
    display: block;
    width:70%;
    margin-left:70px;
  }
   
  input[type="radio"]{
    margin-left:70px;
  }

  #loggedWaste{
    margin:0px;
  }


}

/*End of mobile view*/

/*------------------------------------------------------------------------------------*/

/*Desktop query*/
@media only screen and (min-width: 992px) {
  .grid-container {
    grid-template-columns:repeat(16, 6.25%);
    grid-row-gap: 2em;
  }


  form,#loggedWaste {
    grid-column: 5/13;
  }


  label {
    width: 40%;

  }

}


</style>