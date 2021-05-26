<template>
  <div class="mt-36 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center">
      <h2 class="text-base text-black pt-1 text-4xl font-bold tracking-wide uppercase">Du musst dafür eingeloggt sein!</h2>
      <p class="mt-3 text-center text-gray-500 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl">
        Logge dich auf der Startseite mit Google ein um diese Seite öffnen zu können!
      </p>
      <div class="flex justify-center">
        <button
            class="px-9 mt-3 py-4 font-semibold rounded-sm block sm:w-auto border-purple-300 bg-purple-200 hover:bg-purple-300 text-purple-700"
            v-on:click="goHome">
          Bestätigen
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "YouWillLeave",
  methods: {
    goHome() {
      window.location = process.env.NODE_ENV !== 'production' ? 'http://localhost:8080/' : 'https://yourweb.monster/'
    }
  }
}
</script>
