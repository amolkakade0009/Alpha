<!-- Navigation bar-->
<?php include 'header.php'; ?>


<style>
    body {
  margin: 0;
  font-family: Arial, sans-serif;
}

.gallery {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 10px;
 
}

.gallery-item {
  overflow: hidden;
  border-radius: 5px;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
.gallery-item-left{
  background-color: rgb(212, 211, 211);
  padding: 10px 10px 10px 10px;
}
.gallery-item-middle{
  background-color: rgb(212, 211, 211);
  padding: 150px 10px 10px 10px;
}
.gallery-item-middle2{
  background-color: rgb(212, 211, 211);
  padding: 10px 10px 10px 10px;
}
.gallery-item-right{
  background-color: rgb(212, 211, 211);
  padding: 150px 10px 10px 10px;
}
  

.gallery-item img {
  width: 100%;
  height: auto;
  border-radius: 5px;
}
/* image module  */

.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0,0,0,0.9);
}

.modal-image {
  margin: auto;
  display: block;
  max-width: auto;
  max-height: auto;
}

.close {
  color: white;
  position: absolute;
  top: 15px;
  right: 35px;
  font-size: 40px;
  font-weight: bold;
  cursor: pointer;
}
</style>

<div class="gallery">
  <div class="gallery-item gallery-item-left ">
    <img src="./images/gym-6.jpg" alt="" onclick="openModal('./images/gym-6.jpg')">
    <img src="./images/gym-7.jpg" alt="" onclick="openModal('./images/gym-7.jpg')">
     <img src="./gallaryImages/gallary-3.jpeg" alt="" onclick="openModal('./gallaryImages/gallary-3.jpeg')">
    <img src="./gallaryImages/gallary-4.jpeg" alt="" onclick="openModal('./gallaryImages/gallary-4.jpeg')">
    <img src="./gallaryImages/gallary-5.jpeg" alt="" onclick="openModal('./gallaryImages/gallary-5.jpeg')">
    <img src="./images/gym-1.jpg" alt="" onclick="openModal('./images/gym-1.jpg')">
    <img src="./gallaryImages/gallary-19.jpeg" alt="" onclick="openModal('./gallaryImages/gallary-19.jpeg')">
    <img src="./gallaryImages/gallary-20.jpeg" alt="" onclick="openModal('./gallaryImages/gallary-20.jpeg')">
    <img src="./gallaryImages/gallary-21.jpeg" alt="" onclick="openModal('./gallaryImages/gallary-21.jpeg')">
    <img src="./gallaryImages/gallary-27.jpeg" alt="" onclick="openModal('./gallaryImages/gallary-27.jpeg')">


  </div>
  <div class="gallery-item gallery-item-middle">
    <img src="./images/gym-8.jpg" alt="" onclick="openModal('./images/gym-8.jpg')">
    <img src="./images/gym-2.jpg" alt="" onclick="openModal('./images/gym-2.jpg')">
    <img src="./images/gym-3.jpg" alt="" onclick="openModal('./images/gym-3.jpg')">
    <img src="./images/gym-1.jpg" alt="" onclick="openModal('./images/gym-1.jpg')">
    <img src="./gallaryImages/gallary-17.jpg" alt="" onclick="openModal('./gallaryImages/gallary-17')">
    <img src="./gallaryImages/gallary-6.jpeg" alt="" onclick="openModal('./gallaryImages/gallary-6.jpeg')">
    <img src="./gallaryImages/gallary-7.jpeg" alt="" onclick="openModal('./gallaryImages/gallary-7.jpeg')">
    <img src="./gallaryImages/gallary-8.jpeg" alt="" onclick="openModal('./gallaryImages/gallary-8.jpeg')">
    <img src="./gallaryImages/gallary-25.jpeg" alt="" onclick="openModal('./gallaryImages/gallary-25.jpeg')">
    <img src="./gallaryImages/gallary-26.jpeg" alt="" onclick="openModal('./gallaryImages/gallary-26.jpeg')">


  
  </div>
  <div class="gallery-item gallery-item-middle2">
    <img src="./images/gym-4.jpg" alt="" onclick="openModal('./images/gym-4.jpg')">
    <img src="./images/gym-5.jpg" alt="" onclick="openModal('./images/gym-5.jpg')">
    <img src="./images/alphaLoga-1.jpg" alt="" onclick="openModal('./images/alphaLoga-1.jpg')">
    <img src="./gallaryImages/gallary-9.jpeg" alt="" onclick="openModal('./gallaryImages/gallary-9.jpeg')">
    <img src="./gallaryImages/gallary-10.jpeg" alt="" onclick="openModal('./gallaryImages/gallary-10.jpeg')">
    <img src="./gallaryImages/gallary-11.jpeg" alt="" onclick="openModal('./gallaryImages/gallary-11.jpeg')">
    <img src="./gallaryImages/gallary-12.jpeg" alt="" onclick="openModal('./gallaryImages/gallary-12.jpeg')">
    <img src="./gallaryImages/gallary-18.jpg" alt="" onclick="openModal('./gallaryImages/gallary-18.jpeg')">
    <img src="./gallaryImages/gallary-24.jpeg" alt="" onclick="openModal('./gallaryImages/gallary-24.jpeg')">


  </div>
  <div class="gallery-item gallery-item-right">
    <img src="./gallaryImages/gallary-13.jpg" alt="" onclick="openModal('./gallaryImages/gallary-13.jpg')">
    <img src="./gallaryImages/gallary-14.jpg" alt="" onclick="openModal('./gallaryImages/gallary-14.jpg')">
    <img src="./gallaryImages/gallary-15.jpg" alt="" onclick="openModal('./gallaryImages/gallary-15.jpg')">
    <img src="./gallaryImages/gallary-16.jpg" alt="" onclick="openModal('./gallaryImages/gallary-16.jpg')">
    <img src="./gallaryImages/gallary-3.jpeg" alt="" onclick="openModal('./gallaryImages/gallary-3.jpeg')">
    <img src="./gallaryImages/gallary-4.jpeg" alt="" onclick="openModal('./gallaryImages/gallary-4.jpeg')">
    <img src="./gallaryImages/gallary-22.jpeg" alt="" onclick="openModal('./gallaryImages/gallary-22.jpeg')">
    <img src="./gallaryImages/gallary-23.jpeg" alt="" onclick="openModal('./gallaryImages/gallary-23.jpeg')">
    <img src="./gallaryImages/gallary-28.jpeg" alt="" onclick="openModal('./gallaryImages/gallary-28.jpeg')">


  </div>
  <!-- Add more images here -->
</div>
<div id="modal" class="modal">
  <span class="close" onclick="closeModal()">&times;</span>
  <img id="modal-image" src="" alt="">
</div>


 <!-- footer section-->
 <?php include 'footer.php'; ?>




<script>
  function openModal(imageSrc) {
  document.getElementById("modal-image").src = imageSrc;
  document.getElementById("modal").style.display = "block";
}

function closeModal() {
  document.getElementById("modal").style.display = "none";
}

</script>

