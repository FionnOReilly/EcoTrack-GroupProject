<template>
    
<div class="grid-container">
  <form action="#" method="get" id="wasteLogForm" class="wasteLogForm">
    <fieldset id="fieldset1">
      <div id="fieldset2">
        <legend>Waste Logging</legend>

        <p>
          <label for="wasteType"  class="wasteLabel">Waste Type: </label>
          <select id="wasteType" name="wasteType">
            <option value="select">Select a Type</option>
            <option value="general">General Waste</option>
            <option value="recyclable">Recyclable Materials</option>
            <option value="glass">Glass Waste </option>
            <option value="oragnic">Organic Waste</option>
          </select>

          <span id="wasteError" class="error"></span></p>

       

          <p>
          <label for="bagSize" class="wasteLabel">Bag Size: </label>
          <select id="wasteType" name="wasteType">
            <option value="select">Select a Size</option>
            <option value="generalWaste">Small Bag (25L)</option>
            <option value="recyclableWaste">Medium Bag (50L) </option>
            <option value="glassWaste">Large Bag (20L) </option>
            <option value="oragnicWaste">Large Bag (100L) </option>
          </select>
          <span id="bagSizeError" class="error"></span></p>

      
        <p><label for="fName"  class="wasteLabel">Recyclable: </label>
            <input type="radio" name="isRecyclable" id="recylable">Yes
            <input type="radio" name="notRecyclable" id="recylable">No
        <span id="recyclableError" class="error"></span></p>


        <p><label for="dateOfDisposal">Date of Disposal: </label><input type="date" name="dateOfDisposal" id="dateOfDisposal">
            <span id="dateOfDisposalError" class="error"></span></p>

        <div class="buttonContainer">
          <input type="submit" value="Submit" class="contactButton" id="submitButton">
          <input type="reset" value="Reset" class="contactButton" id="resetButton">
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

    <tr>
      <td>General Waste</td>
      <td>Small Bag (25L)</td>
      <td>Yes</td>
      <td>29/10/2024</td>
    </tr>
  </table>
</div>

</div>


<FooterComponent></FooterComponent>
 


</template>

<script>

import FooterComponent from "./FooterComponent.vue"; 

export default {
  name: 'WasteLogPage',
  components: {FooterComponent,
  }
};

</script>

<style scoped>
.grid-container {
  display: grid;
  grid-template-columns: 100%;
}

.contactButton:hover {
  border-radius: 20px;
}

#submitButton:hover {
  background-color: #adffe7; 
}

#resetButton:hover {
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

 #submitButton, #resetButton {
  padding: 5px;
margin:5px;
  width: 7em;
  font-weight: bold;
  color: black;
}

#resetButton{
  background-color:#F79181;
}

#submitButton{
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