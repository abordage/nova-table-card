<template>
    <card class="px-4 py-4">
        <h2 v-if="card.title" class="text-lg px-2 mb-2">{{ card.title }}</h2>

        <table class="w-full table-default" cellpadding="0" cellspacing="0" data-testid="resource-table">
            <tr v-for="item in card.rows" class="group">

                <td class="
                    text-left
                    text-90
                    px-2
                    py-2
                    border-t
                    border-gray-100
                    dark:border-gray-700
                    dark:bg-gray-800
                    group-hover:bg-gray-50
                    dark:group-hover:bg-gray-900">
                    {{ item.title }}
                    <div v-if="item.subtitle" class="text-xs text-gray-400">{{ item.subtitle }}</div>
                </td>

                <td class="
                    td-fit
                    text-right
                    align-middle
                    px-2
                    py-2
                    border-t
                    border-gray-100
                    dark:border-gray-700
                    dark:bg-gray-800
                    group-hover:bg-gray-50
                    dark:group-hover:bg-gray-900">

                    <div class="flex items-center justify-end space-x-0 text-gray-400">
                        <a :href="item.viewUrl" class="toolbar-button hover:text-primary-500 px-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" width="24" height="24" class="inline-block" role="presentation">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274
                                      4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </a>

                        <a v-if="item.editUrl" :href="item.editUrl" class="toolbar-button hover:text-primary-500 px-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" width="24" height="24" class="inline-block" role="presentation">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0
                                      112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </a>
                    </div>
                </td>
            </tr>
        </table>
    </card>
</template>

<script>
export default {
    props: {
        card: {
            type: Object,
            required: true,
        },
    },
}
</script>
