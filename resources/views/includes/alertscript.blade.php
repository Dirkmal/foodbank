<script>
    let alertCard = document.getElementsByClassName("alert-card");
      setTimeout(()=>{
     for(var i = 0; i < alertCard.length; i++){
      if(alertCard[i].getAttributeNames().includes("transform")){
          alertCard[i].removeAttribute("transform");
      }
     }
    },4000)
</script>