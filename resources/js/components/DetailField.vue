<template>
    <PanelItem :index="index" :field="field">
        <template #value>
            <p>{{ field.value }}<span v-if="field.displayPercentSign"> %</span></p>
        </template>
    </PanelItem>
</template>

<script>
export default {
    props: ['index', 'resource', 'resourceName', 'resourceId', 'field'],
};
</script>
