<template>
  <Head title="Grupos"/>

  <BreezeAuthenticatedLayout>
  <template #header>
    Grupos
  </template>

      <div v-show="$page.props.flash.success"
           class="inline-flex w-full mb-4 overflow-hidden bg-white rounded-lg shadow-md">
          <div class="flex items-center justify-center w-12 bg-green-500">
              <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                  <path
                      d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z">
                  </path>
              </svg>
          </div>

          <div class="px-4 py-2 -mx-3">
              <div class="mx-3">
                  <span class="font-semibold text-green-500">Success</span>
                  <p class="text-sm text-gray-600">{{ $page.props.flash.success }}</p>
              </div>
          </div>
      </div>
  <div class="p-4 bg-white rounded-lg shadow-xs">
    <div class="inline-flex overflow-hidden mb-4 w-full bg-white rounded-lg shadow-md">
              <BreezeButton
                  class="w-full"
                  @click="create"
              >
                  Nuevo Grupo
              </BreezeButton>
    </div>

    <div class="overflow-hidden mb-8 w-full rounded-lg border shadow-xs">
      <div class="overflow-x-auto w-full">
        <table class="w-full whitespace-no-wrap">
          <thead>
          <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
            <th class="px-4 py-3">Nombre</th>
            <th class="px-4 py-3">Descripción</th>
              <th class="px-4 py-3">Tipo</th>
              <th class="px-4 py-3">Acciones</th>
          </tr>
          </thead>
          <tbody class="bg-white divide-y">
          <tr v-for="group in groups.data" :key="group.id" class="text-gray-700">
            <td class="px-4 py-3 text-sm">
              {{ group.name }} ({{ group.users_count}} participantes)
            </td>
            <td class="px-4 py-3 text-sm description">
              {{ group.description }}
            </td>
              <td class="px-4 py-3 text-sm">
                  {{ group.type }}
              </td>
              <td class="px-4 py-3 text-sm">
                  Todo
              </td>
          </tr>
          </tbody>
        </table>
      </div>
      <div
          class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase bg-gray-50 border-t sm:grid-cols-9">
        <pagination :links="groups.links" />
      </div>
    </div>
  </div>
  </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import Pagination from '@/Components/Pagination.vue';
import BreezeButton from '@/Components/Button.vue';
import { Head } from '@inertiajs/inertia-vue3';
import Cuttr from 'cuttr';


export default {
  components: {
    BreezeAuthenticatedLayout,
    Pagination,
      BreezeButton,
      Head
  },
    props: {
    groups: Object,
  },

    mounted() {
      console.log('hola');

        new Cuttr('.description', {
            length: 20
        });
    },
    methods:{
      create(){
          this.$inertia.get(route('groups.create'));
      }
    }
}
</script>
