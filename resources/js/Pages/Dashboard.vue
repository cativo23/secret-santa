<template>
  <Head title="Inicio"/>

  <BreezeAuthenticatedLayout>
    <template #header>
      Inicio
    </template>

    <div class="p-4 bg-white rounded-lg shadow-xs">
      Bienvenido {{ $page.props.auth.user.name }}!
    </div>
  </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';

export default {
  components: {
    BreezeAuthenticatedLayout,
    Head,
  },
};
</script>
