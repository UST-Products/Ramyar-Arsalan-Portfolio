<template>
<div>
<v-footer fixed>
<v-col class="text-center " cols="12">
{{ new Date().getFullYear() }} — 
<strong >
<router-link target="_blank" class="p-2" to="/">{{appName()}}
<v-icon>mdi mdi-web</v-icon>
</router-link>
</strong>
</v-col>
</v-footer>
</div>
</template>
