<template>
    <main>
        <section>
            <div class="flex justify-center pt-24">
                <img src="./../../assets/system/home banner.png" alt="home banner" class=" ">
            </div>
        </section>
        <section>
            <div class="flex self-center ">
                <div class="flex justify-center ">
                    <div class="m-16">
                        <div class="">
                            <div class="flex justify-center  grid grid-cols-5 gap-6">
                                <div class="items-center " v-for="product in products" :key="product.id">
                                    <div class="relative overflow-hidden group">
                                        <img :src="product.productInfo.product_image[0].url" alt="wrapkit" class="object-cover rounded-lg" />
                                        <div
                                            class="absolute h-full w-full bg-black/20 flex items-center justify-center -bottom-10 group-hover:bottom-0 opacity-0 group-hover:opacity-100 transition-all duration-300">
                                            <button class="bg-black text-white py-2 px-5" @click="addToCart()">Add to cart</button>
                                        </div>
                                    </div>
                                    <div class="card border-0">
                                        <h6>
                                            <a :href="'/view/product/' + product.productInfo.product_id" class="link">{{ product.product_name }} </a>
                                        </h6>
                                        <h6 class="subt">by {{ product.sellername }}</h6>
                                        <h5 class="font-medium m-b-30">
                                            P {{ product.price }} <span
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
import sampleDataForRandomProduct from './../../js/json/sampleDataForRandomProduct.json'
export default {
    data() {
        return {
            products: sampleDataForRandomProduct.randomproduct
        }
    },
    created() {
        this.getRandomProducts();
    },
    methods: {
        async getRandomProducts() {
            const res = await fetch("https://652d6314f9afa8ef4b275e12.mockapi.io/product-list");
            const data = await res.json();
            console.log(data)
            this.products = new Proxy(data, {});
            console.log(this.products);
        },
        viewProduct(){

        },
        async addToCart(id, quantity) {
            this.$router.push('/view/product')
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