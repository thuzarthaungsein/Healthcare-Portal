<template>
    <div class="modal" v-if="isOpen">
    <div class="modal-body">
      <span class="close-button" @click="toggleModal">X</span>     
      <h3>Title of the Modal</h3>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        Aenean quis velit neque. Praesent laoreet sit amet nisl
        sit amet condimentum. Sed ligula nunc, ullamcorper nec
      </p>
      <Button color="secondary" @click="toggleModal">Close</Button>
      <Button color="primary" name="submit" @Click="deletePost(newsList.id)">Delete User</Button>
    </div>
    <div class="overlay"></div>
</div>
</template>

<script>

export default { 
  data() {
    return {
      isOpen: false,
    };
  },
  methods: {
    toggleModal() { 
      this.isOpen = !this.isOpen; 
    },
    deletePost(id) {
			this.selectedUser = id;
			this.confirmModal = true;
		},
  },
  mounted() {
    this.$parent.$on('toggleModal', this.toggleModal);
},
}
</script>

<style scoped>
.modal {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: 100%;
  position: fixed;
  top: 0;
  left: 0;
   background-color: #b7dad2;
}
  .modal-body {
    display: flex;
    align-items: center;
    flex-direction: column;
    background: #fff;
    padding: 2rem 4rem;
    border-radius: 5px;
    box-shadow: 0 1.5px 3px 0 rgba(0, 0, 0, 0.1);
    position: relative;
    max-width: 20%;
    z-index: 2;
  }
   @media (max-width: 860px) {     
 
    .close-button {
      position: absolute;
      display: flex;
      align-items: center;
      justify-content: center;
      background : #fff;
      bottom: 94%;
      left: 94%;
      box-shadow: 0 1.5px 3px 0 rgba(0, 0, 0, 0.2);
      width: 35px;
      height: 35px;
      border-radius: 100px;
      font-weight: 600;    
    }
    .close-button:hover{
      cursor: pointer;
    }
    img {
      width: 100px;
    }
    h3 {
      color: #808080;
      font-weight: 600;
      font-size: 25px;
    }
    p {
      margin: 0;
      color: #808080;
      font-size: 18px;
      text-align: center;
    }
  }
  .overlay {
    position: absolute;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.5);
  }

.fade-enter-active, .fade-leave-active {
  transition: opacity .3s;
}
.fade-enter, .fade-leave-to {
  opacity: 0;
}
</style>
