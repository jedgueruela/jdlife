<template>
  <div class="spinner"></div>
</template>

<!-- Taken from https://www.w3schools.com/howto/howto_css_loader.asp with small modifications. -->
<style scoped>
.spinner {
  border: 4px solid #efefef;
  border-radius: 50%;
  border-top: 4px solid #a9a9a9;
  display: inline-block;
  height: 20px;
  vertical-align: sub;
  width: 20px;

  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>