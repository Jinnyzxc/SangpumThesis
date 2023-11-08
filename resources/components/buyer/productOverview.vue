<template>
    <nav class="pt-20 px-10 bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <div>
                <button @click="">
                    <span class="material-symbols-outlined"> menu</span>
                </button>
            </div>
            <div class="mx-2">
                <button @click="" class="bg-gray-500/75 px-6 py-1  rounded-full text-white mx-1">
                    <span class=""> Marketplace</span>
                </button>
            </div>
            <div class="flex-grow mx-2">
                <form>
                    <label for="default-search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <span class="material-symbols-outlined"> search</span>
                        </div>
                        <input type="search" id="default-search"
                            class="block w-full text-sm text-gray-900 border border-gray-300 bg-gray-50 rounded-full focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search Product" required>
                    </div>
                </form>
            </div>
            <div class="flex items-center md:order-2">
                <button type="button"
                    class="flex mr-3 text-sm bg-white-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    id="user-menu-button">
                    <span class="sr-only">Open user menu</span>
                    <span class="material-symbols-outlined"> home</span>
                </button>
            </div>
        </div>
    </nav>
    <section>
        <div class="flex flex-row justify-center">
            <div class="flex flex-col hidden md:flex ">
                <!-- <div class="max-h-36 overlfow-auto y-scroll">  add scroll bar on image selection -->
                    <div v-for="viewProductImage, index in product.product_image" :key="index"
                        class="relative w-36 h-36  m-3">
                        <button @click="clicViewProductImage(viewProductImage.url)" class="">
                            <img :src="viewProductImage.url" :alt="viewProductImage"
                                class="object-fit flex self-center w-36 h-36 border">
                        </button>
                    </div>
                <!-- </div> -->
            </div>
            <div class="flex justify-center w-1/2 h-96">
                <div class="relative ">
                    <img :src="selectedImage" :alt="selectedImage"
                        class="object-contain  justfiy-center items-center max-h-full max-w-30 m-4">
                </div>
            </div>
            <div>
                <div>
                    <button @click="goToSellerShop()">{{ sellerName }}</button>
                    <span v-if="isVerifiedUser" class="material-symbols-outlined bg-teal-600"> new_releases</span>
                </div>
                <div>
                    <div>{{ product.product_name }}</div>
                    <div>{{ selectedVariationPrice }} </div>
                    <div>{{ product.pre_order }}</div>
                    <div>{{ product.release }}</div>
                    <div>
                        <span>Variation</span>
                        <div class="flex flex-row">
                            <div v-for="salesInfo, index in product.salesInfo" :key="index">
                                <button
                                    :class="variationSelectedIndex === index ? 'bg-gray-400 m-2 px-2 border w-auto' : 'm-2 px-2 border w-auto'"
                                    @click="selectVariation(salesInfo.variation, index, salesInfo.price)">{{
                                        salesInfo.variation }}
                                </button>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div><span>Quantity</span></div>
                        <div>
                            <input type="number" min="1" max="100" class="" v-model="quantity" @input="limitQuantity()"
                                @keydown="handleKeyDownQuantity">
                        </div>
                        <div><span>Total</span></div>
                        <div>
                            <span> P {{ totalAmount }}</span>
                        </div>
                    </div>
                    <div>
                        <button class="bg-teal-500/75 px-4 py-1 w-30 rounded-full text-white mx-1" @click="addToCart()">
                            Add to Cart
                        </button>
                        <button class="bg-gray-500/75 px-6 py-1  w-30 rounded-full text-white"
                            data-modal-hide="add-product-modal">
                            Buy Now
                        </button>
                        {{ paramItems }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
import sampleData from './../../js/json/sampleDataForViewProduct.json'
export default {
    data() {
        return {
            sellerName: sampleData.sellername,
            sellerId: sampleData.sellerId,
            product: sampleData.productInfo,
            quantity: 1,
            selectedImage: '',
            isVerifiedUser: true,
            variationSelectedIndex: 0,
            selectedVariationPrice: 0,
            vairationData: '',
            totalAmount: 0,
            paramItems: {}
        }
    },
    created() {
        const firstImage = this.product.product_image[0].url
        const firstProdPrice = this.product.salesInfo[0].price
        const firstVariation = this.product.salesInfo[0].variation
        if (this.product.product_image.length > 0) {
            this.selectedImage = firstImage;
        }
        if (this.product.salesInfo.length > 0) {
            this.vairationData = firstVariation
            this.selectedVariationPrice = firstProdPrice.toFixed(2)
        }
        this.paramItems = this.constructParam(0)
        this.totalPrice()
    },
    watch: {
        quantity() {
            this.totalPrice()
        }
    },
    methods: {
        handleKeyDownQuantity() {
            if (event.key === "-" || event.key === "+" || event.key === "e") {
                event.preventDefault();
                this.message = `You pressed "${event.key}" key, which is not allowed in a number input.`;
            } else {
                this.message = "";
            }
        },
        limitQuantity() {
            if (this.quantity > 100) {
                this.quantity = 100;
            }
        },
        clicViewProductImage(data) {
            this.selectedImage = data;
        },
        selectVariation(vairationData, index, price) {
            this.variationSelectedIndex = index
            this.selectedVariationPrice = price.toFixed(2)
            this.vairationData = vairationData
            this.selectedImage = this.product.product_image[index].url
            this.paramItems = this.constructParam(index)
            this.totalPrice()
        },
        goToSellerShop() {
        },
        totalPrice() {
            this.totalAmount = this.quantity * this.selectedVariationPrice
        },
        constructParam(index) {
            const id = this.product.salesInfo[index].salesInfo_id
            let param = {
                salesInfo_id: id,
            }
            return param
        },
        async addToCart() {
            try {
                console.log()
                const response = await axios.post('/api/buyer/addToCart', this.paramItems);
                if (response.data.status) {
                    // add value on cart icon 

                } else {
                    alert(response.data.error_data[0]);
                }
            } catch (ex) {
                alert('Error exception', ex);
            }
        }
    }
}
</script>
<style>
.scrollbar {
  scrollbar-width: thin;
  scrollbar-color: var(--scrollbar-thumb) var(--scrollbar-track);

  --scrollbar-thumb: #888;
  --scrollbar-track: #f0f0f0;

  /* Firefox */
  scrollbar-width: thin;
  scrollbar-color: var(--scrollbar-thumb) var(--scrollbar-track);
}

/* Define scrollbar thumb color */
.scrollbar::-webkit-scrollbar-thumb {
  background-color: var(--scrollbar-thumb);
}

/* Define scrollbar track color */
.scrollbar::-webkit-scrollbar-track {
  background-color: var(--scrollbar-track);
}

</style>