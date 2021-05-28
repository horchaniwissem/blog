<template>
    <div>
        <h2>Liste des commentaires</h2>
        <div v-if="!load" v-for="comment in comments">
            <div class="bg-white shadow-md w-full p-4 my-4">
                <h3 class="font-bold text-gray-900">
                    {{ comment.author }}
                </h3>
                <br>
                <p class="text-gray-600 text-sm">
                    {{ comment.content }}
                </p>
                <small v-on:click="responseComment(comment.id)" class="underline text-gray-600 text-sm">Répondre à ce commentaire</small>
            </div>
            <div v-for="subComment in comment.comments" class="pl-4">
                <div class="ml-8 bg-white shadow-md w-full p-4 my-4">
                    <h3 class="font-bold text-gray-900">
                        {{ subComment.author }}
                    </h3>
                    <br>
                    <p class="text-gray-600 text-sm">
                        {{ subComment.content }}
                    </p>
                </div>
            </div>
        </div>
        <div v-if="load">
            Chargement...
        </div>
        <hr>
        <div v-if="user" class="bg-white shadow-lg w-full p-4 my-4">
            <h3 class="font-bold text-gray-900 mb-3">
                {{ user.name }}
            </h3>
            <span v-if="comment_id" v-on:click="cancelReponse" class="underline text-red-600 text-sm">Annuler répondre</span>
            <textarea  v-model="message" class="bg-gray-200 w-full" placeholder="Votre commentaire"></textarea>
            <br>
            <button v-on:click="sendComment" class="btn btn-primary btn-sm mt-2 btn-block">Envoyer mon commentaire</button>
        </div>
    </div>
</template>

<script>
    export default {
        data:function () {
            return {
                load: true,
                message: null,
                comment_id: null,
                user: [],
                comments: []
            }
        },
        props: ['post_id'],
        mounted() {
            axios.get('/api/user')
                .then(response => (this.user = response.data));
            this.getPost()
        },
        methods: {
            getPost() {
                let obj = this
                axios.get('/api/articles/' + this.post_id)
                    .then(response => {
                        obj.comments = response.data
                        obj.load = false
                    });
            },
            sendComment() {
                if (this.message !== '')
                {
                    this.load = true
                    let obj = this
                    const comment = {
                        message: this.message,
                        post_id: this.post_id,
                        comment_id: this.comment_id
                    };
                    axios.post("/api/comments/create", comment)
                        .then(response => obj.getPost());
                }

            },
            responseComment(commetId) {
                this.comment_id = commetId
            },
            cancelReponse() {
                this.comment_id = null
            }
        }
    }
</script>
