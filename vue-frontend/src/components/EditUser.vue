<template>
  <div>
    <table>
      <thead>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Actions</th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="user in users" :key="user.id">
        <td>
          <input v-model="user.first_name" />
        </td>
        <td>
          <input v-model="user.last_name" />
        </td>
        <td>
          <input v-model="user.email" />
        </td>
        <td>
          <button @click="editUser(user.id)">Save</button>
        </td>
      </tr>
      </tbody>
    </table>
  </div>
</template>
