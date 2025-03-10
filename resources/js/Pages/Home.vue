<template>

    <Head title="Home" />
    <header class="">
        <nav>
            <div class="container mx-auto flex px-4">
                <Link href="/" class="py-2 text-primary-500">
                <img src="../../assets/images/logo.png" alt="Sch" class="h-10">
                </Link>
                <div class="flex-auto"></div>
                <div class="hidden self-center md:flex space-x-4 py-2 text-primary-500">
                    <Link href="/">HOME</Link>
                    <Link href="/">ABOUT</Link>
                    <Link href="/">EMARKET</Link>
                    <Link href="/">EDUCATION</Link>
                    <Link href="/">NEWS</Link>
                    <Link href="/">EVENTS</Link>
                    <Link href="/login">LOGIN</Link>
                    <Link href="/register">REGISTER</Link>
                </div>

            </div>
        </nav>
        <div class="hero">
            <div class="filter bg-gradient-to-r from-primary-50/80">
                <div class="container mx-auto h-96 md:h-130 flex ">
                    <div class="self-center px-2 md:px-16 text-primary-900 text-center md:text-left">
                        <h1 class="text-xl md:text-4xl font-bold">WELCOMETO SMART COOP HUB</h1>
                        <h2 class="md:text-2xl my-4 font-bold">THE SMART BUSINESS NETWORK</h2>
                        <p class="font-bold max-w-md mb-4">The SCH system is poised to revolutionize collaboration,
                            transparency, and support for SMEs, cooperatives,
                            and supplier diversity</p>
                        <Link href="/register"
                            class="text-white bg-primary-500 rounded-md py-3 inline-block px-8 hover:bg-primary-600 mt-4 transition-all">
                        JOIN US NOW</Link>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="main">
        <section>
            <div class="filter py-32">
                <div class="container mx-auto text-secondary-500">
                    <h2></h2>
                    <div class="grid md:grid-cols-3 gap-4 text-center">
                        <div>
                            <img src="../../assets/images/ico_1.png" alt="" class="mx-auto w-32 h-24">
                            <h3 class="text-xl font-bold text-primary-400 my-4">Financial Literacy</h3>
                            <p>We Equip cooperatives, SMEs, and other members with essential financial education
                                resources to enhance their financial literacy, decision-making, and economic
                                sustainability.</p>
                        </div>

                        <div>
                            <img src="../../assets/images/ico_2.png" alt="" class="mx-auto w-32 h-24">
                            <h3 class="text-xl font-bold text-primary-400 my-4">Supplier Diversity</h3>
                            <p> We Promote supplier diversity by providing a platform for SMEs to connect with
                                organizations, institutions, and agencies looking to engage with a diverse range of
                                suppliers.</p>
                        </div>

                        <div>
                            <img src="../../assets/images/ico_3.png" alt="" class="mx-auto w-32 h-24">
                            <h3 class="text-xl font-bold text-primary-400 my-4">COLLABORATION</h3>
                            <p>Facilitate seamless collaboration and communication among internal stakeholders,
                                enabling collective efforts to promote SME growth.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="filter  bg-primary-50/50 py-16 md:py-32 px-4">
                <div class="container mx-auto">
                    <div class="md:flex md:space-x-4">
                        <img src="../../assets/images/ico_2.png" alt="" class="self-center">
                        <div class="flext-auto self-center">
                            <h2 class="text-2xl md:text-4xl text-primary-800 mb-4">About us</h2>
                            <p class="text-secondary-500">The Smart Coop Hub (SCH) system is an innovative and
                                integrated digital platform designed
                                to foster collaboration, transparency, and economic growth within the Small and
                                Medium-sized Enterprises (SME) and supplier diversity ecosystem. This cloud-based
                                platform serves as a dynamic hub, connecting stakeholders at various levels, from
                                national to individual businesses. The primary goal is to empower SMEs, support supplier
                                diversity, and drive economic development through an array of valuable features.</p>
                            <Link href="/register"
                                class="text-primary-500 hover:text-white border-2 border-primary-400 rounded-md py-3 inline-block px-8 hover:bg-primary-300 mt-7 transition-all">
                            Read More</Link>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section>
            <div class="filter ">
                <div class="container mx-auto py-16 md:py-32 px-4">
                    <h2 class="my-7 text-primary-800 text-2xl">OUR FEATURED BUSINESSES</h2>
                    <div class="md:flex md:space-x-4">
                        <div class="flex-auto">
                            <Link v-for="i in 6"
                                class="md:flex block md:space-x-4 bg-gradient-to-t md:bg-gradient-to-l from-primary-50 rounded-md overflow-hidden shadow-sm transition-all hover:bg-primary-50 hover:shadow-md mb-4">
                            <img src="../../assets/images/img_1.png" alt="" class="md:w-32 rounded-md">
                            <div class="flex-auto p-2">
                                <div class="flex">
                                    <h4 class="flex-auto text-xl text-primary-800">Bussness Name</h4>
                                    <div>
                                        <span
                                            class="bg-primary-100 px-2 rounded-md text-primary-800 text-sm">Public</span>
                                    </div>
                                </div>
                                <p class="text-secondary-500">Some announcement description here. this will contain
                                    the details of the
                                    announcement.</p>
                                <div class="text-secondary-500">
                                    <span>0971234567</span> | <span>company@mail.com</span>
                                </div>
                                <!-- <Link href="#"
                                        class="text-primary-500 border border-primary-500 rounded-md px-2 py-1 mt-4 inline-block hover:bg-primary-50 transition">
                                    View
                                    Details</Link> -->
                            </div>
                            </Link>
                            <Link href="/register"
                                class="text-white bg-primary-500 rounded-md py-3 inline-block px-8 hover:bg-primary-600 mt-4 transition-all">
                            VIEW ALL</Link>
                        </div>

                        <hr class="my-10 md:hidden">
                        <div class="md:w-1/4 ">
                            <h2 class="text-xl text-primary-800 ">Business Listing</h2>
                            <p class="text-secondary-500">
                                We allow SMEs to showcase their businesses, making it easier for potential partners and
                                clients to find them.</p>
                            <h2 class="text-xl text-primary-800 mt-4">Business Networking</h2>
                            <p class="text-secondary-500">We provide a platform for SMEs to connect, build
                                relationships, and explore potential
                                collaborations.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="filter bg-primary-50/50">
                <div class="container mx-auto py-16 md:py-32 px-4 text-secondary-500">
                    <h2 class="my-7 text-primary-800 text-2xl">OUR FEATURED PRODUCTS</h2>
                    <div class="grid md:grid-cols-4 gap-4">
                        <Link v-for="index in 16" :key="index" href="/"
                            class="bg-white shadow-sm rounded overflow-hidden hover:bg-primary-50 hover:shadow-xl transition">
                        <img src="../../assets/images/img_1.png" alt="" class="aspect-video w-fill">
                        <div class="p-2 ">
                            <div class="flex my-2">
                                <h4 class="flex-auto font-bold">Product Name</h4>
                                <div>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <p>This is a product or service descriptions
                                designed to foster collaboration,
                                transparency, and economic growth</p>
                            <p class="text-primary-800 text-2xl font-bold">ZMW {{ Math.round((Math.random()) * 1000.0)
                                }}</p>
                        </div>
                        </Link>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="filter ">
                <div class="container mx-auto py-16 md:py-32 px-4">
                    <h2 class="my-7 text-primary-800 text-2xl">OUR RECENT PUBLICATIONS</h2>
                    <div class="md:flex md:space-x-4">
                        <div class="flex-auto">
                            <Link v-for="i in 5"
                                class="md:flex block md:space-x-4 bg-gradient-to-t md:bg-gradient-to-l from-primary-50 rounded-md overflow-hidden shadow-sm transition-all hover:bg-primary-50 hover:shadow-md mb-4">
                            <img src="../../assets/images/img_1.png" alt="" class="md:w-32 rounded-md">
                            <div class="flex-auto p-2">
                                <div class="flex">
                                    <h4 class="flex-auto text-xl text-primary-800">Bussness Name</h4>
                                    <div>
                                        <span
                                            class="bg-primary-100 px-2 rounded-md text-primary-800 text-sm">Public</span>
                                    </div>
                                </div>
                                <p class="text-secondary-500">Some announcement description here. this will contain
                                    the details of the
                                    announcement.</p>
                                <div class="text-secondary-500">
                                    <span>0971234567</span> | <span>company@mail.com</span>
                                </div>
                                <!-- <Link href="#"
                                        class="text-primary-500 border border-primary-500 rounded-md px-2 py-1 mt-4 inline-block hover:bg-primary-50 transition">
                                    View
                                    Details</Link> -->
                            </div>
                            </Link>
                            <Link href="/register"
                                class="text-white bg-primary-500 rounded-md py-3 inline-block px-8 hover:bg-primary-600 mt-4 transition-all">
                            VIEW ALL</Link>
                        </div>

                        <hr class="my-10 md:hidden">
                        <div class="md:w-1/4 ">
                            <img src="../../assets/images/img_1.png" alt="" class="aspect-video w-full">
                            <h2 class="text-xl text-primary-800 my-4">The High Stakes of Tech Marketing and the ‘Green
                                Lantern’ Conundrum</h2>
                            <p class="text-secondary-500">
                                Last week, I attended the HP Amplify Partner Conference along with the CEOs of AMD,
                                Google, Intel, Nvidia, and Qualcomm. Each of these CEOs praised HP’s effort, but Jensen
                                Huang stood out because he actively pitched HP’s new workstation and PC lines, which he
                                had encouraged HP to build.
                            </p>
                            <p class="text-secondary-500">
                                One of the common discussions was why Dell was getting so much credit, given that it
                                doesn’t have an AI solution and significantly lagged HP in security, partners,
                                sustainability, and AI.
                            </p>
                            <p class="text-secondary-500">
                                At the end of the event, one of my favorite actors, Ryan Reynolds, joined virtually.
                                Reynolds was on a shoot, but his partner was on stage and brought up the “Green Lantern”
                                <Link href="/" class="text-primary-500">… Read more</Link>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="filter bg-gradient-to-r from-[#F3DEF9] to-primary-50">
                <div class="container max-w-auto p-4">
                    <div class="md:flex  text-secondary-500">
                        <img src="../../assets/images/char_1.png" alt="">
                        <div class="md:flex-auto self-center">
                            <h2 class="text-2xl md:text-7xl">Have a question?
                                Our team is always ready
                                to assist you.</h2>
                            <p class="mt-4">We formulate strategies that define the brands of our
                                partners pushing the
                                boundaries of
                                business experience.</p>

                            <button class="bg-primary px-8 py-2 rounded">CONTACT US</button>
                            <span>OR CALL +260 97 1864421</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="filter ">
                <div class="container max-w-auto">
                    <h2></h2>

                </div>
            </div>
        </section>

        <footer>
            <div class="filter bg-primary-500">
                <div class="container mx-auto text-secondary-50 py-32">
                    <div class="grid grid-cols-4 gap-4">
                        <img src="../../assets/images/logo.png" alt="">
                        <div>
                            <p>Quick Links</p>
                            <Link href="#" class="block hover:bg-primary-600 px-2 transition">About us</Link>
                            <Link href="#" class="block hover:bg-primary-600 px-2 transition">Browse our plans</Link>
                            <Link href="#" class="block hover:bg-primary-600 px-2 transition">See Example building plans
                            </Link>
                        </div>

                        <div>
                            <p>POLICIES</p>
                            <Link href="#" class="block hover:bg-primary-600 px-2 transition">Terms & Conditions</Link>
                            <Link href="#" class="block hover:bg-primary-600 px-2 transition">Privacy Policy</Link>
                            <Link href="#" class="block hover:bg-primary-600 px-2 transition">Refund Policy</Link>
                        </div>

                        <div>
                            <p>Address</p>
                            <p>+260 97 9729 858</p>
                            <p>support@mfumu.com</p>
                            <Link href="#">
                            </Link>
                        </div>
                    </div>
                    <div class="my-24 border-t border-primary-300 pt-4 text-center">
                        <p class="text-secondary-200">(C) 2024 schub.com all rights reserved.</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>


</template>

<script setup>
import { Link, Head } from '@inertiajs/vue3';
import { onMounted } from 'vue'
import { initFlowbite } from 'flowbite'

// initialize components based on data attribute selectors
onMounted(() => {
    initFlowbite();
})
</script>

<style >
.hero{
    background-image: url('../../assets/images/bg_1.png');
}
</style>