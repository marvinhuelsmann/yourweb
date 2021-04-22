<template>
  <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
      <div>
        <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
             alt="Workflow"/>
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
          mini Monster Seite erstellen
        </h2>
        <p class="mt-2 text-center text-sm text-gray-600">
          Oder
          {{ ' ' }}
          <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
            erstelle dir deine Max Monster Seite
          </a>
        </p>
      </div>
      <form class="mt-8 space-y-6" action="#" method="POST">
        <input type="hidden" name="remember" value="true"/>
        <div class="rounded-md shadow-sm -space-y-px">
          <h2 class="py-4 mt-6 text-center text-3xl font-medium text-gray-900">
            Vorbereitung:
          </h2>
          <!--  <div>
              <label for="email-address" class="sr-only">Email address</label>
              <input id="email-address" name="email" type="email" autocomplete="email" required="" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email Adresse*" />
            </div>-->
          <div>
            <label for="password" class="sr-only">Code</label>
            <input id="password" name="password" type="password" autocomplete="current-password" required=""
                   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                   placeholder="Beta Code*"/>
          </div>
          <div class="py-1">
            <h2 class=" mt-6 text-center text-3xl font-medium text-gray-900">
              mini Seite:
            </h2>
            <p class=" text-center text-sm text-gray-600">
              Diese Daten werden öffentlich auf deinem Profil stehen
            </p>
          </div>
          <div class="">
            <label for="name" class="sr-only">Name</label>
            <input id="name" name="name" autocomplete="name" required="" type="text"
                   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                   placeholder="Name*"/>
          </div>
          <div class="pt-2">
            <label for="birthday" class="sr-only">Geburtstag</label>
            <input id="birthday" name="birthday" autocomplete="birthday" required="" type="text"
                   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                   placeholder="Geburtstag"/>
          </div>
          <div class="pt-2">
            <label for="place" class="sr-only">Wohnort</label>
            <input id="place" name="place" autocomplete="place" required="" type="text"
                   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                   placeholder="Wohnort"/>
          </div>
          <div class="pt-2">
            <label for="subHeader" class="sr-only">Zwischenüberschrift</label>
            <textarea id="subHeader" name="subHeader" autocomplete="subHeader" required=""
                      class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                      placeholder="Zwischenüberschrift*"/>
          </div>
          <div class="pt-2">
            <label for="biography" class="sr-only">Biografie</label>
            <textarea id="biography" name="biography" autocomplete="biography" required=""
                      class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                      placeholder="Biographie*"/>
          </div>
          <div class="pt-2">
            <label for="color" class="">Lieblingsfarbe: </label>
            <input id="color" name="color" autocomplete="color" type="color" required="" class="" placeholder="Farbe:"/>
          </div>
        </div>

        <div class="flex items-center justify-between">
          <div class="flex items-center">
            <input id="remember_me" name="remember_me" type="checkbox"
                   class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"/>
            <label for="remember_me" class="ml-2 block text-sm text-gray-900">
              Remember me
            </label>
          </div>

          <div class="text-sm">
            <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
              Vorschau ansehen
            </a>
          </div>
        </div>

        <div>
          <button type="submit"
                  class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
              <LockClosedIcon class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" aria-hidden="true"/>
            </span>
            Erstellen
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import {LockClosedIcon} from '@heroicons/vue/solid'

export default {
  components: {
    LockClosedIcon
  },
}
</script>