<template>
  <section class="parallax-container">
    <div class="parallax-background" :style="{ transform: `translateY(${backgroundOffset}px)`, backgroundImage: `url(${$root.path + '/img/' +backgroundImage})` }"></div>
    <div class="content-overlay">
      <div class="container content">
        <h1 class="text--softgical" >SoftGical - ADHD</h1>
          <p>
              SoftGical is a project that uses artificial intelligence to detect ADHD in children
          </p>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      scrollOffset: 0,
      backgroundOffset: 0,
      backgroundSpeed: 0.2, // Velocidad de movimiento del fondo
      backgroundImage: 'default.jpeg',
    };
  },
  mounted() {
    window.addEventListener('scroll', this.handleScroll);
  },
  destroyed() {
    window.removeEventListener('scroll', this.handleScroll);
  },
  methods: {
    handleScroll() {
      this.scrollOffset = window.scrollY;
      this.backgroundOffset = this.scrollOffset * this.backgroundSpeed;
    },
    updateBackground() {
      this.backgroundOffset = this.scrollOffset * this.backgroundSpeed;
    },
  },
};
</script>

<style scoped>
.parallax-container {
  position: relative;
  height: 700px;
  overflow: hidden;
}

.parallax-background {
  position: absolute;
  left: 0;
  width: 100%;
  height: 100%;
  background-position: center center;
    background-repeat: no-repeat;
  background-size: contain;
  z-index: -1;
  
}
.content-overlay {
  display: flex;
  align-items: flex-end;
  position: relative;
  background-color: rgba(0, 0, 0, 0.5);
  height: 100%;
  width: 100%;
  z-index: 1; /* Coloca el contenido y el overlay en una capa superior que el fondo */
}


.content {
  position: relative;
  padding: 20px;
  text-align: left;
  color: white;
  top: -110px;
  font-size: 32px;
}
</style>
