<template>
  <div
    id="add-product-modal"
    tabindex="-1"
    aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full"
  >
    <div class="relative w-full max-w-full max-h-full">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <!-- Modal header -->
        <div
          class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600"
        >
          <div class="flex justify-between items-center pb-3">
            <div class="flex justify-between items-center text-2xl font-bold">
              <h1>Add New Products</h1>
            </div>
          </div>
          <div class="flex justify-between items-center pb-3 m-1">
            <button
              class="bg-teal-500/75 px-6 py-1 rounded-full text-white mx-1"
              @click="createNewProduct()"
            >
              save
            </button>
            <button
              class="bg-gray-500/75 px-4 py-1 rounded-full text-white"
              data-modal-hide="add-product-modal"
            >
              cancel
            </button>
          </div>
        </div>
        <!-- Modal body -->
        <div class="p-6 space-y-6">
          <div class="relative w-full max-w-full max-h-full">
            <form action="#">
              <div class="flex justify-center">
                <div class="m-4 basis-1/2">
                  <div
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                  >
                    Basic Information
                  </div>
                  <div class="mx-auto w-full p-8">
                    <div>
                      <div>
                        <span
                          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                          >Product Images</span
                        >
                        <div class="grid md:grid-cols-2">
                          <div class="justify-self-end">
                            <label
                              for="dropzone-file"
                              class="flex flex-col items-center justify-center w-40 h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600"
                            >
                              <div
                                class="flex flex-col items-center justify-center pt-5 pb-6"
                              >
                                <div
                                  class="flex flex-col items-center justify-center py-10 text-center"
                                >
                                  <span class="material-symbols-outlined">
                                    add_photo_alternate
                                  </span>
                                  <p class="text-thin text-sm text-slate-400">
                                    click in this area.
                                  </p>
                                </div>
                              </div>
                              <input
                                accept="image/png, image/jpeg"
                                id="dropzone-file"
                                type="file"
                                class="hidden"
                                multiple
                                @change="handleFileInput"
                              />
                            </label>
                          </div>
                          <div class="flex items-center m-4">
                            <span class="mr-2"> Add Image</span>
                            <span> {{ numberOfFileInputted }} /12</span>
                          </div>
                        </div>
                        <div class="grid md:grid-cols-12">
                          <div v-for="images, index in productInfo.product_image" :key="index">
                            <!-- fix height and wieght -->
                            <img :src="images.url" alt="" />
                          </div>
                        </div>
                      </div>
                      <div>
                        <label
                          for="price"
                          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                          >Product Name</label
                        >
                        <div class="relative">
                          <input
                            type="text"
                            name="price"
                            id="price"
                            class="w-full rounded-lg border border-slate-200 px-2 py-1 pr-16 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40"
                            v-model="productInfo.product_name"
                          />
                          <div>
                            <span class="flex justify-end text-slate-400"
                              >{{ productNameLength }}/3000
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="grid gap-6 mb-3 md:grid-cols-2">
                        <div>
                          <label
                            for="price"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Category</label
                          >
                          <input
                            type="text"
                            name="price"
                            id="price"
                            class="w-full rounded-lg border border-slate-200 px-2 py-1 pr-8 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40"
                            v-model="productInfo.category"
                          />
                        </div>
                        <div>
                          <label
                            for="price"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Sub-Category</label
                          >
                          <input
                            type="text"
                            name="price"
                            id="price"
                            class="w-full rounded-lg border border-slate-200 px-2 py-1 pr-8 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40"
                            v-model="productInfo.sub_category"
                          />
                        </div>
                      </div>
                      <div>
                        <label
                          for="price"
                          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                          >Display Amount
                        </label>
                        <input
                          type="text"
                          name="price"
                          id="price"
                          class="w-full rounded-lg border border-slate-200 px-2 py-1 pr-8 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40"
                          v-model="productInfo.displayAmount"
                        />
                      </div>
                      <div>
                        <label
                          for="description"
                          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                          >Product Description</label
                        >
                        <textarea
                          id="description"
                          rows="4"
                          class="w-full rounded-lg border border-slate-200 px-2 py-1 pr-8 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40"
                          placeholder="Enter description here"
                          v-model="productInfo.description"
                        >
                        </textarea>
                        <span class="flex justify-end text-slate-400"
                          >{{ prodDesc }}/3000
                        </span>
                      </div>
                      <div>
                        <label
                          for="pre_order"
                          class="relative block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                          >Pre-order</label
                        >

                        <label
                          v-for="option in preOrderOptions"
                          :key="option.value"
                          class="radio-label"
                        >
                          <input
                            type="radio"
                            :id="option.id"
                            :value="option.value"
                            v-model="productInfo.pre_order"
                            class=""
                          />
                          {{ option.label }}
                          <p
                            v-show="option.label == 'No'"
                            class="font-thin text-sm"
                          >
                            I will ship out within 2 business days (excluding
                            public holidays and courier service non-working
                            days)
                          </p>

                          <p
                            v-show="option.label == 'Yes'"
                            class="font-thin text-sm"
                          >
                            I need 7 business days to ship (between 7 to 30)
                          </p>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div
                  class="overflow-hidden shadow border-r border-gray-200"
                ></div>
                <div class="m-4 basis-1/2">
                  <div class="text-bold">
                    <span>Sales Information</span>
                  </div>
                  <div class="mx-auto w-full p-8">
                    <div class="">
                      <table>
                        <thead>
                          <tr>
                            <th
                              v-for="(salesInfo, index) in salesInfoHeader"
                              :key="index"
                              class="px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                            >
                              <span v-show="salesInfo.header != 'Sales'">{{
                                salesInfo.header
                              }}</span>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr
                            v-for="(saleInfo, index) in productInfo.salesInfo"
                            :key="index"
                          >
                            <td class="px-6 py-4 whitespace-nowrap">
                              <input
                                type="text"
                                :name="'parcel size ' + index"
                                v-model="saleInfo.variation"
                                class="w-full rounded-lg border border-slate-200 px-2 py-1 pr-8 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40"
                              />
                            </td>
                            <td
                              class="relative px-6 py-4 whitespace-nowrap"
                              dir="rtl"
                            >
                              <input
                                type="text"
                                :name="'parcel size ' + index"
                                v-model="saleInfo.price"
                                class="w-full rounded-lg border border-slate-200 px-2 py-1 pl-8 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40"
                              />
                              <div
                                class="absolute px-2 border-s border-gray-200 left-8 top-6 h-5 w-5 text-slate-400"
                              >
                                P
                              </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                              <input
                                type="text"
                                :name="'parcel size ' + index"
                                v-model="saleInfo.stock"
                                class="w-full rounded-lg border border-slate-200 px-2 py-1 pr-8 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40"
                              />
                            </td>
                            <td>
                              <span
                                class="material-symbols-outlined"
                                @click="deleteVariation(index)"
                                v-show="index != 0"
                              >
                                delete
                              </span>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div>
                        <button
                          type="button"
                          class="p-2 border font-thin text-sm"
                          @click="addVariation($event)"
                        >
                          Add Vairation
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="">
                    <span>Shop Information</span>
                  </div>
                  <div class="mx-auto w-full p-8">
                    <div class="">
                      <div class="grid gap-6 mb-3 md:grid-cols-4">
                        <div>
                          <label
                            for="Parcel Size"
                            class="flex justify-end block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Weight</label
                          >
                        </div>
                        <div class="relative">
                          <input
                            type="text"
                            name="parcel size"
                            id=""
                            v-model="productInfo.shippingInfo.weight"
                            class="w-full rounded-lg border border-slate-200 px-2 py-1 pr-8 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40"
                          />
                          <div class="">
                            <div
                              class="absolute px-1 border-l border-gray-200 right-2 top-2 h-5 w-5 text-slate-400"
                            >
                              kg
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="pt-2">
                      <div class="grid gap-6 mb-3 md:grid-cols-4">
                        <div>
                          <label
                            for="Parcel Size"
                            class="flex justify-end block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Parcel Size</label
                          >
                        </div>
                        <div class="relative">
                          <input
                            type="text"
                            name="parcel size"
                            id=""
                            v-model="productInfo.shippingInfo.parcel_size_x"
                            class="w-full rounded-lg border border-slate-200 px-2 py-1 pr-8 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40"
                          />
                          <div class="">
                            <div
                              class="absolute px-1 border-l border-gray-200 right-2 top-2 h-5 w-5 text-slate-400"
                            >
                              cm
                            </div>
                          </div>
                          <div
                            class="absolute px-1 mb-3 text-sm h-5 w-5 text-slate-400"
                          >
                            width
                          </div>
                        </div>
                        <div class="relative">
                          <input
                            type="text"
                            name="parcel size"
                            id=""
                            v-model="productInfo.shippingInfo.parcel_size_y"
                            class="w-full rounded-lg border border-slate-200 px-2 py-1 pr-8 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40"
                          />
                          <div class="">
                            <div
                              class="absolute px-1 border-l border-gray-200 right-2 top-2 h-5 w-5 text-slate-400"
                            >
                              cm
                            </div>
                          </div>
                          <div
                            class="absolute px-1 mb-3 text-sm h-5 w-5 text-slate-400"
                          >
                            length
                          </div>
                        </div>
                        <div class="relative mb-5">
                          <input
                            type="text"
                            name="parcel size"
                            id=""
                            v-model="productInfo.shippingInfo.parcel_size_z"
                            class="w-full rounded-lg border border-slate-200 px-2 py-1 pr-8 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40"
                          />
                          <div class="">
                            <div
                              class="absolute px-1 border-l border-gray-200 right-2 top-2 h-5 w-5 text-slate-400"
                            >
                              cm
                            </div>
                          </div>
                          <div
                            class="absolute px-1 mb-3 text-sm h-5 w-5 text-slate-400"
                          >
                            height
                          </div>
                        </div>
                      </div>
                      <div>
                        <p class="font-thin text-sm m-3 ml-10">
                          Please fill in dimensions accurately. Inaccurate or
                          missing dimensions may result in additional shipping
                          fee or failed delivery. If your item exceeds the
                          maximum weight or parcel size limit, you may contact
                          Customer Service to add XDE Logistics or other
                          logistics provider as courier.
                        </p>
                      </div>
                    </div>
                    <div>
                      <div class="grid mb-3 md:grid-cols-2">
                        <div>
                          <label
                            for="category-create"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Shipping Fee</label
                          >
                        </div>
                        <select
                          id="category-create"
                          v-model="productInfo.shippingInfo.shipping_fee"
                          class="w-full rounded-lg border border-slate-200 px-2 py-1 pr-8 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40"
                        >
                          <option selected="">Standard Local</option>
                          <option value="FL">Overseas</option>
                        </select>
                      </div>
                      <div>
                        <p class="font-thin text-sm m-1 ml-10">
                          Shipping settings will be applicable for this product
                          only. Shipping fees displayed are base rates and will
                          be subject to change depending on buyer and seller
                          location. Economy Local base rates shown are only
                          applicable to sellers in Metro Manila (and select
                          Luzon cities) for shipments to VisMin, which will be
                          30% cheaper than Standard Local. Kindly contact your
                          Relationship Manager to know more about Economy Local
                          and how to activate it.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import salesInfoHeader from "./../../../js/config/tableConfig";
import signupConfig from "../../../js/config/signupConfig";
import { Modal } from "flowbite";

const $targetEl = document.getElementById("add-product-modal");

// options with default values
const options = {
  placement: "bottom-right",
  backdrop: "dynamic",
  backdropClasses:
    "bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40",
  closable: true,
  onHide: () => {
    console.log("modal is hidden");
  },
  onShow: () => {
    console.log("modal is shown");
  },
  onToggle: () => {
    console.log("modal has been toggled");
  },
};

const modal = new Modal($targetEl, options);

export default {
  props: {
    showAddToCart: Boolean,
    productDetails: Object,
    sellerName: String,
    sellerId: String,
  },
  data() {
    return {
      salesInfoHeader: salesInfoHeader.saleInfo,
      prodDesc: 0,
      preOrderOptions: [
        { label: "Yes", value: true, id: 1 },
        { label: "No", value: false, id: 2 },
      ],
      productNameLength: 0,
      numberOfFileInputted: 0,
      seller_id: "5",
      seller_name: "laravel",
      productInfo: {
        product_image: [],
        product_name: "",
        category: "",
        sub_category: "",
        description: "",
        displayAmount: "",
        pre_order: false,
        salesInfo: [
          {
            variation: "",
            price: 0,
            stock: 0,
          },
        ],
        shippingInfo: {
          weight: 0,
          parcel_size_z: 0, //height
          parcel_size_x: 0, //width
          parcel_size_y: 0, //length
          shipping_fee: "Standard Local",
        },
      },
      fromUpdateProductDetails: false,
    };
  },
  watch: {
    "productInfo.product_name"() {
      this.productNameLength = this.productInfo.product_name.length;
    },
    "productInfo.description"() {
      this.prodDesc = this.productInfo.description.length;
    },
    // productDetails() {
    //   if (this.productDetails !== null) {
    //     this.productInfo = this.productDetails;
    //     this.seller_name = this.sellerName;
    //     this.seller_id = this.sellerId;
    //     this.fromUpdateProductDetails = true;
    //   }
    // },
  },
  methods: {
    handleFileInput(event) {
      const files = event.target.files;
      const allowedExtensions = ["png", "jpeg", "jpg"]; // Add any other allowed extensions
      let validFiles = [];
      const formData = [];
      for (let i = 0; i < files.length; i++) {
        const file = files[i];
        const fileExtension = file.name.split(".").pop().toLowerCase();
        if (allowedExtensions.includes(fileExtension)) {
          file.url = URL.createObjectURL(file);
          validFiles.push(file);
        }
      }
      if (validFiles.length + this.numberOfFileInputted > 12) {
        // Limit the total number of files to 12
        alert("You can upload a maximum of 12 files.");
      } else {
        this.numberOfFileInputted += validFiles.length;
        for (const validfile in validFiles) {
          this.productInfo.product_image.push(validFiles[validfile]);
          console.log(this.productInfo.product_image);
        } // Here, you can handle the validFiles array as needed (e.g., store or display them)
      }
    },
    handleKeydown(event, fieldCode) {
      const allowedKeys = signupConfig.allowKeys;
      const fieldNumberType = signupConfig.fieldNumberType;
      if (
        !allowedKeys.includes(event.key) &&
        fieldNumberType.includes(fieldCode)
      ) {
        event.preventDefault(); // Prevent input of non-numeric keys
      }
    },
    addVariation() {
      this.productInfo.salesInfo.push({});
    },
    deleteVariation(index) {
      if (this.productInfo.salesInfo.length != 1) {
        this.productInfo.salesInfo.splice(index, 1);
      }
    },
    async createNewProduct() {
      try {
        this.productInfo.seller_id = this.seller_id;
        this.productInfo.seller_name = this.seller_name;
        if (!this.fromUpdateProductDetails) {
          const response = await axios.post(
            "/api/product/add",
            this.productInfo
          );
          if (response.status === 200 && response.data.status === true) {
            alert("Product Successfuly Created");
          } else {
            // Authentication failed, handle error

            alert(response.data.error_data[0]);
          }
        }
        else {
            const response = await axios.post(
            "/api/product/edit",
            this.productInfo
          );
          if (response.status === 200 && response.data.status === true) {
            alert("Product Successfuly Created");
          } else {
            // Authentication failed, handle error

            alert(response.data.error_data[0]);
          }
        }
      } catch (ex) {
        // Handle other errors here
        alert(ex);
      }
    },
  },
};
</script>