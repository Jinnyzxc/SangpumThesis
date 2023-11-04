<template>
    <div id="add-product-modal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-full max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <div class="flex justify-between items-center pb-3">
                        <p class="flex justify-between items-center text-2xl font-bold ">
                        <h1>Add New Products </h1>
                        </p>
                    </div>
                    <div class="flex justify-between items-center pb-3 m-1 ">
                        <button class="bg-teal-500/75 px-6 py-1  rounded-full text-white mx-1" @click="">
                            save
                        </button>
                        <button class="bg-gray-500/75 px-4 py-1 rounded-full text-white"
                            data-modal-hide="add-product-modal">
                            cancel
                        </button>
                    </div>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <div class="relative w-full max-w-full max-h-full">
                        <form action="#">
                            <div class="flex justify-center ">
                                <div class="m-4 basis-1/2">
                                    <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">
                                        Basic Information
                                    </div>
                                    <div class="mx-auto w-full p-8">
                                        <div>
                                            <div>
                                                <span
                                                    class=" block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Product
                                                    Images</span>
                                                <div class="grid md:grid-cols-2">
                                                    <div class="justify-self-end">
                                                        <label for="dropzone-file"
                                                            class="flex flex-col items-center justify-center w-40 h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                            <div
                                                                class="flex flex-col items-center justify-center pt-5 pb-6">
                                                                <div
                                                                    class="flex flex-col items-center justify-center py-10 text-center">
                                                                    <span class="material-symbols-outlined">
                                                                        add_photo_alternate
                                                                    </span>
                                                                    <p class="text-thin text-sm text-slate-400"> click in this
                                                                        area.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <input accept="image/png, image/jpeg" id="dropzone-file"
                                                                type="file" class="hidden" multiple
                                                                @change="handleFileInput" />
                                                        </label>
                                                    </div>
                                                    <div class="flex items-center m-4">
                                                        <span class="mr-2"> Add Image</span>
                                                        <span> {{ numberOfFileInputted }} /12</span>
                                                    </div>
                                                </div>
                                                <div class="grid md:grid-cols-12">
                                                    <div v-for="images in productInfo.product_image">
                                                        <img :src="images.url" alt="" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <label for="price"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product
                                                    Name</label>
                                                <div class="relative">
                                                    <input type="text" name="price" id="price"
                                                        class="w-full rounded-lg border border-slate-200 px-2 py-1 pr-16 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40"
                                                        required="">
                                                    <div>
                                                        <span class="flex justify-end text-slate-400">{{ productNameLength
                                                        }}/3000 </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <label for="price"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                                <input type="text" name="price" id="price"
                                                    class="w-full rounded-lg border border-slate-200 px-2 py-1 pr-8 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40"
                                                    required="">
                                            </div>
                                            <div>
                                                <label for="description"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product
                                                    Description</label>
                                                <textarea id="description" rows="4"
                                                    class="w-full rounded-lg border border-slate-200 px-2 py-1 pr-8 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40"
                                                    placeholder="Enter description here" maxlength="3000" @input=""
                                                    @v-model="">
                                            </textarea>
                                                <span class="flex justify-end  text-slate-400">{{ prodDesc }}/3000 </span>
                                            </div>
                                            <div>
                                                <label for="pre_order"
                                                    class="relative block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pre-order</label>
                                                <div class="relative items-center justify-center">
                                                    <input type="checkbox" name="price" id="price" class="">
                                                    <span class="px-2">No</span>
                                                    <p class="font-thin text-sm">I will ship out within 2 business days
                                                        (excluding public holidays and courier service non-working days)</p>
                                                </div>
                                                <div class="relative items-center justify-center">
                                                    <input type="checkbox" name="price" id="price" class="">
                                                    <span class="px-2 ">Yes</span>
                                                    <p class="font-thin text-sm">I need 7 business days to ship (between 7
                                                        to
                                                        30)</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="overflow-hidden shadow border-r border-gray-200 "></div>
                                <div class="m-4 basis-1/2">
                                    <div class="text-bold">
                                        <span>Sales Information</span>
                                    </div>
                                    <div class="mx-auto w-full p-8">
                                        <div class="">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th v-for="salesInfo in salesInfoHeader"
                                                            class="px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            <span v-show="salesInfo.header != 'Sales'">{{ salesInfo.header
                                                            }}</span>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(saleInfo, index) in productInfo.salesInfo" :key="index">
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <input type="text" :name="'parcel size ' + index"
                                                                v-model="saleInfo.variation"
                                                                class="w-full rounded-lg border border-slate-200 px-2 py-1 pr-8 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40">
                                                        </td>
                                                        <td class="relative px-6 py-4 whitespace-nowrap " dir="rtl">
                                                            <input type="text" :name="'parcel size ' + index"
                                                                v-model="saleInfo.price"
                                                                class="w-full rounded-lg border border-slate-200 px-2 py-1 pl-8 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40">
                                                            <div
                                                                class="absolute  px-2  border-s  border-gray-200  left-8 top-6 h-5 w-5 text-slate-400">
                                                                P</div>
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <input type="text" :name="'parcel size ' + index"
                                                                v-model="saleInfo.stock"
                                                                class="w-full rounded-lg border border-slate-200 px-2 py-1 pr-8 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40">
                                                        </td>
                                                        <td>
                                                            <span class="material-symbols-outlined"
                                                                @click="deleteVariation(index)" v-show="index != 0">
                                                                delete
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div>
                                                <button type="button" class="p-2 border font-thin text-sm"
                                                    @click="addVariation()"> Add
                                                    Vairation</button>
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
                                                    <label for="Parcel Size"
                                                        class="flex justify-end block mb-2 text-sm font-medium text-gray-900 dark:text-white">Weight</label>
                                                </div>
                                                <div class="relative">
                                                    <input type="text" name="parcel size" id=""
                                                        class="w-full rounded-lg border border-slate-200 px-2 py-1 pr-8 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40">
                                                    <div class="">
                                                        <div
                                                            class="absolute  px-1 border-l border-gray-200  right-2 top-2 h-5 w-5 text-slate-400">
                                                            kg</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pt-2">
                                            <div class="grid gap-6 mb-3 md:grid-cols-4">
                                                <div>
                                                    <label for="Parcel Size"
                                                        class="flex justify-end block mb-2 text-sm font-medium text-gray-900 dark:text-white">Parcel
                                                        Size</label>
                                                </div>
                                                <div class="relative ">
                                                    <input type="text" name="parcel size" id=""
                                                        class="w-full rounded-lg border border-slate-200 px-2 py-1 pr-8 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40">
                                                    <div class="">
                                                        <div
                                                            class="absolute  px-1 border-l border-gray-200  right-2 top-2 h-5 w-5 text-slate-400">
                                                            cm</div>
                                                    </div>
                                                    <div class="absolute  px-1 mb-3  text-sm h-5 w-5 text-slate-400">
                                                        width</div>
                                                </div>
                                                <div class="relative">
                                                    <input type="text" name="parcel size" id=""
                                                        class="w-full rounded-lg border border-slate-200 px-2 py-1 pr-8 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40">
                                                    <div class="">
                                                        <div
                                                            class="absolute px-1 border-l border-gray-200 right-2 top-2 h-5 w-5 text-slate-400">
                                                            cm</div>
                                                    </div>
                                                    <div class="absolute  px-1 mb-3 text-sm  h-5 w-5 text-slate-400">
                                                        length</div>
                                                </div>
                                                <div class="relative mb-5">
                                                    <input type="text" name="parcel size" id=""
                                                        class="w-full rounded-lg border border-slate-200 px-2 py-1 pr-8 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40">
                                                    <div class="">
                                                        <div
                                                            class="absolute  px-1 border-l border-gray-200  right-2 top-2 h-5 w-5 text-slate-400">
                                                            cm</div>
                                                    </div>
                                                    <div class="absolute  px-1 mb-3 text-sm  h-5 w-5 text-slate-400">
                                                        height</div>
                                                </div>
                                            </div>
                                            <div>
                                                <p class="font-thin text-sm m-3 ml-10">Please fill in dimensions accurately.
                                                    Inaccurate or missing dimensions
                                                    may result in additional shipping fee or failed delivery. If your item
                                                    exceeds the maximum weight or parcel size limit, you may contact
                                                    Customer Service to add XDE Logistics or other logistics provider as
                                                    courier.</p>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="grid mb-3 md:grid-cols-2">
                                                <div>
                                                    <label for="category-create"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Shipping
                                                        Fee</label>
                                                </div>
                                                <select id="category-create"
                                                    class="w-full  rounded-lg border border-slate-200 px-2 py-1 pr-8 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40">
                                                    <option selected="">Standard Local </option>
                                                    <option value="FL">Overseas</option>
                                                </select>
                                            </div>
                                            <div>
                                                <p class="font-thin text-sm m-1 ml-10">
                                                    Shipping settings will be applicable for this product only. Shipping
                                                    fees displayed are base rates and will be subject to change depending on
                                                    buyer and seller location. Economy Local base rates shown are only
                                                    applicable to sellers in Metro Manila (and select Luzon cities) for
                                                    shipments to VisMin, which will be 30% cheaper than Standard Local.
                                                    Kindly contact your Relationship Manager to know more about Economy
                                                    Local and how to activate it.
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
import salesInfoHeader from './../../../js/config/tableConfig'
import signupConfig from '../../../js/config/signupConfig'

export default {
    props: {
        showAddToCart: Boolean
    },
    data() {
        return {
            salesInfoHeader: salesInfoHeader.saleInfo,
            prodDesc: 0,
            productNameLength:  0,
            numberOfFileInputted: 0,
            sellerId: '',
            sellername: '',
            productInfo: {
                product_image: [],
                product_name: '',
                category: '',
                sub_category: '',
                description: '',
                pre_order: null,
                salesInfo: [
                    {
                        variation: '',
                        price: 0,
                        stock: 0
                    }
                ],
                shippingInfo: {
                    weight: 0,
                    parcel_size_z: 0, //height
                    parcel_size_x: 0, //width
                    parcel_size_y: 0, //length
                    shipping_fee: '',
                }
            }
        }
    },
    methods: {
        handleFileInput(event) {
            const files = event.target.files;

            const allowedExtensions = ['png', 'jpeg', 'jpg']; // Add any other allowed extensions

            let validFiles = [];
            const formData = []
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const fileExtension = file.name.split('.').pop().toLowerCase();
                if (allowedExtensions.includes(fileExtension)) {
                    file.url = URL.createObjectURL(file);
                    validFiles.push(file);

                }
            }
            if (validFiles.length + this.numberOfFileInputted > 12) {
                // Limit the total number of files to 12
                alert('You can upload a maximum of 12 files.');
            } else {
                this.numberOfFileInputted += validFiles.length;
                for(const validfile in validFiles) {
                    this.productInfo.product_image.push(validFiles[validfile])
                    console.log(this.productInfo.product_image)
                }                // Here, you can handle the validFiles array as needed (e.g., store or display them)
            }
        },
        handleKeydown(event, fieldCode) {
            const allowedKeys = signupConfig.allowKeys
            const fieldNumberType = signupConfig.fieldNumberType
            if (!allowedKeys.includes(event.key) && fieldNumberType.includes(fieldCode)) {
                event.preventDefault(); // Prevent input of non-numeric keys
            }
        },
        addVariation() {
            this.productInfo.salesInfo.push({})
        },
        deleteVariation(index) {
            if (this.productInfo.salesInfo.length != 1) {
                this.productInfo.salesInfo.splice(index, 1);
            }
        },
        async createNewProduct() {
            try {
                const response = await axios.post('/api/product/add',);
                if (response.status === 200 && response.data.status === true) {
                    localStorage.setItem('APP_DEMO_USER_TOKEN', response.data.token);
                    alert('Successfuly Login')
                    this.$router.push(response.data.url); // Use the named route
                } else {
                    // Authentication failed, handle error
                    alert(response.data.error_data[0]);
                }
            } catch (ex) {
                // Handle other errors here
                alert('An error occurred while logging in.');
            }
        },
    }
}

</script>