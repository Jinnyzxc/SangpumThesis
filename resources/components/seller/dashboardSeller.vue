<template>
    <main>
        <menulist></menulist>
        <section>
            <div class="flex justify-center pt-10">
                <div class="relative justify-center ">
                    <div class="flex items-center space-x-4">
                        <img class="w-40 h-40 rounded-full"
                            src="https://th.bing.com/th/id/OIP.8wvdbNWBNnm9N_baLrhUNAHaE8?pid=ImgDet&rs=1" alt="">
                        <div class="">
                            <div class="font-medium dark:text-white">
                                <div class="m-5">
                                    <span class="pr-40 font-semibold">Jese Leos</span>
                                    <button class="bg-gray-400">Edit Shop</button>
                                </div>
                                <div class=" m-5 text-sm text-gray-500 dark:text-gray-400">Date Est 2014{{ dateEstablish }}
                                </div>
                                <div class="m-5">
                                    seller Description{{ description }}
                                </div>
                            </div>
                        </div>
                        <div class="flex ">
                            <img src="./../../assets/system/home banner.png" alt="home banner" class="h-40">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <form class="sm:pr-4 md:pr-6 lg:pr-6 px-16 pt-10" action="#" method="GET">
                <label for="products-search" class="sr-only">Search</label>
                <div class="relative w-48 mt-1 sm:w-64 xl:w-96">
                    <input type="text" name="email" id="products-search"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Search for products">
                </div>
            </form>
            <div class="flex self-center ">

                <div class="flex justify-center ">
                    <div class="m-16">
                        <div class="">
                            <div class="flex justify-center  grid grid-cols-5 gap-6">
                                <div class="items-center group" v-for="product in products" :key="product.id">
                                    <div class="relative overflow-hidden">
                                        <img :src="product.image" alt="wrapkit" class="object-cover rounded-lg" />
                                        <div
                                            class="absolute h-full w-full bg-black/20 flex items-center justify-center -bottom-10 group-hover:bottom-0 opacity-0 group-hover:opacity-100 transition-all duration-300">
                                            <button class="bg-black text-white py-2 px-5">Update Product</button>
                                        </div>
                                    </div>
                                    <div class="card border-0">
                                        <h6>
                                            <a href="#" class="link">{{ product.name }} </a>
                                        </h6>
                                        <h5 class="font-medium m-b-30">
                                            P{{ product.price }} <span
                                                v-if="product.origprice != '' || product.origprice != null">/</span>
                                            <del class="text-muted line-through"> P {{ product.origprice }}</del>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>

<script>
import menulist from './../static/menuList.vue'
export default {
    components: {
        menulist
    },
    data() {
        return {
            products: [],
            isLoggedIn: true,
            titlePage: "My shop"
        }
    },
    created() {
        this.getProducts();
    },
    methods: {
        getSellerInfo() {

        },
        async getProducts() {
            const res = await fetch("https://652d6314f9afa8ef4b275e12.mockapi.io/product-list");
            const data = await res.json();
            console.log(data)
            this.products = new Proxy(data, {});
            console.log(this.products);
        },
        async addToCart(id, quantity) {
            try {
                const response = await fetch("https://652d6314f9afa8ef4b275e12.mockapi.io/product-list", {
                    method: "POST",
                    body: JSON.stringify({
                        productId: id,
                        quantity: quantity,
                    }),
                    headers: {
                        "Content-type": "application/json; charset=UTF-8",
                    },
                });
                let data = await response.json();
                alert("Item added to cart");
                console.log(data);
            } catch (err) {
                alert("Something went wrong");
                console.log(err);
            }
        },
    },
}
</script>


