<template>
  <menulist></menulist>
  <div class="m-10">
    <div
      class="my-5 items-center justify-between block sm:flex md:divide-x md:divide-gray-100 dark:divide-gray-700"
    >
      <h1
        class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white"
      >
        {{ numberOfProducts }} Products
      </h1>
      <button
        id="createProductButton"
        data-modal-target="add-product-modal"
        data-modal-toggle="add-product-modal"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
        type="button"
        @click="showCartPage()"
      >
        Add new product
      </button>
    </div>
    <!-- table -->
    <div class="flex flex-col">
      <div class="overflow-x-auto">
        <div class="inline-block min-w-full align-middle">
          <div class="overflow-hidden shadow border-t border-gray-200">
            <table
              class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600"
            >
              <tbody
                class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700"
                v-for="(product, index) in products"
                :key="index"
              >
                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                  <td class="w-4 p-4">
                    <div class="flex items-center">
                      <input
                        id="checkbox"
                        type="checkbox"
                        v-model="product.product_name[true]"
                        class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600"
                      />
                    </div>
                  </td>
                  <td
                    class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"
                  >
                    <img :scr="product.product_image" alt="image" />
                  </td>
                  <td
                    class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"
                  >
                    {{ product.product_name }}
                  </td>
                  <td
                    class="flex justify-center items-center p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"
                  >
                    <table class="justify-self-endjustify-center">
                      <thead class="">
                        <tr class="p-10">
                          <td
                            class="p-4"
                            v-for="(saleInfo, index) in salesInfoHeader"
                            :key="index"
                          >
                            {{ saleInfo.header }}
                          </td>
                        </tr>
                      </thead>
                      <tbody
                        v-for="(description, index) in product.sales_info"
                        :key="index"
                      >
                        <tr>
                          <td class="px-4">
                            {{ description.variation }}
                          </td>
                          <td class="px-4">
                            {{ description.price }}
                          </td>
                          <td class="px-4">
                            {{ description.stock }}
                          </td>
                          <td class="px-4">
                            {{ description.sales }}
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                  <td class="relative p-4 space-x-2 whitespace-nowrap">
                    <!-- <router-link :to="`/products/${product.id}/edit`"> -->
                    <button
                      id="createProductButton"
                      data-modal-target="add-product-modal"
                      data-modal-toggle="add-product-modal"
                      class="flex flex-row items-center m-2 px-3 py-2 pr-3 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                      type="button"
                      @click="editProduct(product)"
                    >
                      <span class="material-symbols-outlined pr-2">
                        edit_square
                      </span>
                      Update
                    </button>
                    <!-- </router-link> -->
                    <button
                      type="button"
                      @click="deleteProduct()"
                      id="deleteProductButton"
                      class="flex flex-rowitems-center px-3 py-2 pr-6 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900"
                    >
                      <span class="material-symbols-outlined"> delete </span>
                      Delete
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- pagination -->
    <div
      class="justify-center sticky bottom-0 right-0 items-center w-full p-4 bg-white border-t border-gray-200 sm:flex sm:justify-between dark:bg-gray-800 dark:border-gray-700"
    >
      <div class="flex items-center mb-4 sm:mb-0">
        <a
          href="#"
          class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white"
        >
          <span class="material-symbols-outlined"> chevron_left </span>
        </a>
        <a
          href="#"
          class="inline-flex justify-center p-1 mr-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white"
        >
          <span class="material-symbols-outlined"> chevron_right </span>
        </a>
        <span class="text-sm font-normal text-gray-500 dark:text-gray-400"
          >Showing
          <span class="font-semibold text-gray-900 dark:text-white">{{
            pageIndex
          }}</span>
          of
          <span class="font-semibold text-gray-900 dark:text-white">{{
            numberOfProducts
          }}</span></span
        >
      </div>
      <div class="flex items-center space-x-3">
        <a
          href="#"
          class="inline-flex items-center justify-center flex-1 px-3 py-2 text-sm font-medium text-center text-gray rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
        >
          <svg
            class="w-5 h-5 mr-1 -ml-1"
            fill="currentColor"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
              clip-rule="evenodd"
            ></path>
          </svg>
          Previous
        </a>
        <a
          href="#"
          class="inline-flex items-center justify-center flex-1 px-3 py-2 text-sm font-medium text-center text-gray rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
        >
          Next
          <svg
            class="w-5 h-5 ml-1 -mr-1"
            fill="currentColor"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
              clip-rule="evenodd"
            ></path>
          </svg>
        </a>
      </div>
    </div>
    <div
      class="justify-center sticky bottom-0 right-0 items-center w-full p-4 bg-white sm:flex sm:justify-between dark:bg-gray-800 dark:border-gray-700"
    >
      <div class="flex items-center mb-4 sm:mb-0">
        <button
          class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white"
        >
          <span class=""> Select All </span>
        </button>
      </div>
      <div class="flex items-center space-x-3">
        <button
          href="#"
          class="inline-flex items-center justify-center flex-1 px-3 py-2 text-sm font-medium text-center text-gray rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
        >
          Delete
        </button>
        <button
          class="inline-flex items-center justify-center flex-1 px-3 py-2 text-sm font-medium text-center text-gray rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
        >
          Publish
        </button>
      </div>
    </div>
  </div>

  <AddProductForm
    :showAddToCart="showCart"
    :productDetails="updateProduct"
    :sellerName="seller_name"
    :sellerId="seller_id"
  ></AddProductForm>
</template>
<script>


import sampleData from "./../../../js/config/sampleData.json";


import AddProductForm from './addProductForm.vue'
import menulist from './../../static/menuList.vue'
import {modal } from './../../../js/modal/modalService'
import salesInfoHeader from './../../../js/config/tableConfig'


export default {
  components: {
    AddProductForm,
    menulist,
  },
  data() {
    return {
      showCart: false,
      updateProduct: {},
      seller_id: "",
      seller_name: "",
      products: {},
      numberOfProducts: 0,
      pageIndex: 2,
      salesInfoHeader: salesInfoHeader.saleInfo,
    };
  },
  created() {
    this.getUnpublishedProductList();
  },
  mounted() {
    this.getUnpublishedProductList();
  },
  methods: {
    editProduct(product) {
      this.updateProduct = product;
      console.log("Hello", product);
    },
    showCartPage() {
      const modalName = "addProductModal";
      localStorage.setItem("modal", modalName);
      this.showCart = true;
      modal.show;
    },
    getUnpublishedProductList() {
      axios
        .get("/api/products/seller") // Replace with the actual API endpoint
        .then((response) => {
          //   console.log("API Response:", response);
          // Check if response has data and that data.products exists
          if (response.data && response.data.products) {
            this.products = response.data.products;

            this.numberOfProducts = this.products.length;
          } else {
            // Handle the case where no data or products are present in the response
            console.error("No data or products in the response:", response);
          }
        })
        .catch((error) => {
          console.error("Error fetching data:", error);
        });
    },
  },
};
</script>


