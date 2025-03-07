const BMI_Value = document.getElementById('BMI')
const BodyFatValue = document.getElementById('BodyFat')
const BodyWaterValue = document.getElementById('BodyWater')
const LeanBodyMass = document.getElementById('LBM')
const BMR_Value = document.getElementById('BMR')
const MuscleRate = document.getElementById('MuscleRate')
const MuscleMass = document.getElementById('MuscleMass')
const BoneMass = document.getElementById('BoneMass')
const AgeValue = document.getElementById('Input_Box')
const HeightValue = document.getElementById('HeightInput')
const WeightValue = document.getElementById('WeightInput')
let Gender = undefined
let BMI = undefined
let age = undefined
let BF = undefined
let BMR = undefined
let LBM_Value = undefined
let MuscleMass_Value = undefined
let bodyFat = undefined
// let value
// let value1
// let value2
const Calculate = () => {
  age = parseInt(AgeValue.value, 10);

  // For checking the age range
  if (!AgeValue.validity.valid) {
    alert('Input the age value must be between 0 and 100.');
    return;
  }

  if (MaleRadio.checked) {
    Gender = 0;
    value = 0.407;
    value1 = 0.267;
    value2 = 19.2;
  } else if (FemaleRadio.checked) {
    Gender = 1;
    value = 0.252;
    value1 = 0.473;
    value2 = 48.3;
  }


  BMI_Calculation(),
    BodyFat(),
    LBM(),
    BodyWater(),
    BMRCalculation(),
    MuscleMassCalculation(),
    BoneMassCalculation(),
    pageNavigate();
   



  // functions.forEach((func) => func());

};


const BMI_Calculation = () => {
  const weight = parseFloat(WeightValue.value); // weight in kilograms
  const height = (parseFloat(HeightValue.value) / 100); // height in meters

  BMI = weight / (height * height);
  if (!isNaN(BMI)) BMI_Value.innerText = `${BMI.toFixed(1)}`
  if (BMI < 18.5) BMI_Value.style.color = 'orange'
  else if (BMI >= 18.5 && BMI <= 24.9) BMI_Value.style.color = 'green'
  else if (BMI >= 25 && BMI <= 29.9) BMI_Value.style.color = 'orange'
  else BMI_Value.style.color = 'red'
}



const BodyFat = () => {

  const bmi = parseFloat(BMI);
  if (!isNaN(bmi)) {
    //At reserach Paper Value Assined for a men =0  but if we use men =0 calculation goes wrong
    // const GenderMale=1
    if (Gender === 0) {
      bodyFat = (1.39 * bmi) + (0.16 * age) - (10.34 * 1) - 9
      if (bodyFat >= 2 && bodyFat <= 5) BodyFatValue.style.color = 'orange'
      else if (bodyFat >= 6 && bodyFat <= 13) BodyFatValue.style.color = 'green'
      else if (bodyFat >= 14 && bodyFat <= 17) BodyFatValue.style.color = 'green'
      else if (bodyFat >= 18 && bodyFat <= 24) BodyFatValue.style.color = 'orange'
      else BodyFatValue.style.color = 'red'


    }


    else {
      bodyFat = (1.39 * bmi) + (0.16 * age) - (10.34 * 0) - 9
      if (bodyFat >= 10 && bodyFat <= 13) BodyFatValue.style.color = 'orange'
      else if (bodyFat >= 14 && bodyFat <= 20) BodyFatValue.style.color = 'green'
      else if (bodyFat >= 21 && bodyFat <= 24) BodyFatValue.style.color = 'green'
      else if (bodyFat >= 25 && bodyFat <= 31) BodyFatValue.style.color = 'orange'
      else BodyFatValue.style.color = 'red'

    }
    BodyFatValue.innerText = `${bodyFat.toFixed(1)}`
  }
}


const LBM = () => {
  const LeanBodyMass_Value = value * WeightValue.value + value1 * HeightValue.value - value2

  // console.log(LeanBodyMass_Value)
  // console.log(WeightValue.value)
  // console.log(HeightValue.value)
  LBM_Value = WeightValue.value - (WeightValue.value * (bodyFat / 100))
  let range = ((WeightValue.value - LBM_Value) / WeightValue.value) * 100
  LeanBodyMass.innerText = `${LBM_Value.toFixed(2)}`

  if (Gender === 0) {

    if (range >= 2 && range <= 5) LeanBodyMass.style.color = 'orange'
    else if (range >= 6 && range <= 13) LeanBodyMass.style.color = 'green'
    else if (range >= 14 && range <= 17) LeanBodyMass.style.color = 'green'
    else if (range >= 18 && range <= 24) LeanBodyMass.style.color = 'orange'
    else LeanBodyMass.style.color = 'red'
  }

  else if (Gender === 1) {

    if (range >= 10 && range <= 13) LeanBodyMass.style.color = 'orange'
    else if (range >= 14 && range <= 20) LeanBodyMass.style.color = 'green'
    else if (range >= 21 && range <= 24) LeanBodyMass.style.color = 'green'
    else if (range >= 25 && range <= 31) LeanBodyMass.style.color = 'orange'
    else LeanBodyMass.style.color = 'red'

  }

}


const BodyWater = () => {
  let range
  if (Gender === 0) {
    BF = 2.447 - 0.09156 * age + 0.1074 * HeightValue.value + 0.3362 * WeightValue.value

    range = (BF / WeightValue.value) * 100
    BodyWaterValue.innerText = `${BF.toFixed(2)}`

    if (range < 50) BodyWaterValue.style.color = 'red'
    else if (range >= 50 && range <= 65) BodyWaterValue.style.color = 'green'
    else BodyWater.style.color = 'red'

  } else if (Gender === 1) {
    BF = -2.097 + 0.1069 * HeightValue.value + 0.2466 * WeightValue.value

    range = (BF / WeightValue.value) * 100
    BodyWaterValue.innerText = `${BF.toFixed(2)}`

    if (range <= 45) BodyWaterValue.style.color = 'red'
    else if (range > 45 && range <= 60) BodyWaterValue.style.color = 'red'
    else BodyWaterValue.style.color = 'red'
  }

}


const BMRCalculation = () => {
  if (Gender === 0) {
    BMR = 88.362 + (13.397 * WeightValue.value) + (4.799 * HeightValue.value) - (5.677 * age)
    BMR_Value.innerText = `${BMR.toFixed(2)}`
  } else if (Gender === 1) {

    BMR = 447.593 + (9.247 * WeightValue.value) + (3.098 * HeightValue.value) - (4.330 * age)
    BMR_Value.innerText = `${BMR.toFixed(2)}`
  }
  console.log(BMR)
  //  BMR_Value.innerText=`${BMR.toFixed(2)}`
  if (BMR >= 1000 && BMR <= 2000) BMR_Value.style.color = 'green'
  else BMR_Value.style.color = 'red'
}


const MuscleMassCalculation = () => {

  if (Gender === 0) { ///Here In THe Lee Equation Value for Male is 1
    MuscleMass_Value = 0.567 * WeightValue.value - 0.037 * age + 0.046 * HeightValue.value + 6.1 * 1 - 1.91
  }
  else if (Gender === 1) { /// Here Value For Female is 0
    MuscleMass_Value = 0.567 * WeightValue.value - 0.037 * age + 0.046 * HeightValue.value + 6.1 * 0 - 1.91
  }
  MuscleMass.innerText = `${MuscleMass_Value.toFixed(2)}`
  MuscleMass.style.color = 'green'
}
const BoneMassCalculation = () => {
  const BoneMassValue = LBM_Value - MuscleMass_Value
  BoneMass.innerText = `${BoneMassValue.toFixed(2)}`
  BoneMass.style.color = 'green'
}




const pageNavigate = () => {
 let inputElement = document.getElementById('diet-button'); 
 
  let newPageUrl;

  
  if (BMI < 18.5) {
    inputElement.innerHTML = "Your weight is Underweigh";
    bmiCategory = "underweight";
    alert("Your weight is Underweigh");
  } else if (BMI >= 18.5 && BMI <= 24.9) {
    inputElement.innerHTML = "Your weight is Normal";
    bmiCategory = "normalweight";
    alert("Your weight is Normal");
  } else if (BMI >= 25 && BMI <= 29.9) {
    inputElement.innerHTML = "Your weight is Overweight";
    bmiCategory = "overweight";
    alert("Your weight is Overweight");
  } else {
    inputElement.innerHTML = "Your weight is Overweight";
    bmiCategory = "overweight";
    alert("Your weight is Overweight");
  }

}

// const pageNavigate2 = () => {
//  let inputElement = document.getElementById('diet-button');
//   let newPageUrl;

 
//   if (BMI < 18.5) {
//     inputElement.innerHTML = "Your weight is Underweigh";
//     bmiCategory = "underweight";
   
//   } else if (BMI >= 18.5 && BMI <= 24.9) {
//     inputElement.innerHTML = "Your weight is Normal";
//     bmiCategory = "normalweight";
    
//   } else if (BMI >= 25 && BMI <= 29.9) {
//     inputElement.innerHTML = "Your weight is Overweight";
//     bmiCategory = "overweight";
   
//   } else {
//     inputElement.innerHTML = "Your weight is Overweight";
//     bmiCategory = "overweight";
    
//   }

// }


function openHtmlpage(){
  pageNavigate();
    switch (bmiCategory) {
    case "underweight":
      window.open("underweight.html", "_self");
        break;
    case "normalweight":
      window.open("normalweight.html", "_self");
        break;
    case "overweight":
      window.open("overweight.html", "_self");
        break;
    default:
        alert("Invalid BMI category", "_self");
    }    
}

  
  






Calculate();













