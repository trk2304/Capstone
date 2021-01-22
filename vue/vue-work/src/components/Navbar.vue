<template>
    <div id="nav">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <router-link to="/home" class="navbar-brand" href="#">MidTrade</router-link>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <router-link to="/home" class="nav-link"
                >Home</router-link>
            </li>
            <li class="nav-item">
              <router-link to="/dashboard" class="nav-link">Dashboard</router-link>
            </li>
            <li class="nav-item">
              <router-link to="/login" class="nav-link" href="#">Login</router-link>
            </li>
            <li>
              <router-link to="/helloworld" class="nav-link">Hello World</router-link>
            </li>
          </ul>
        </div>
      </nav>
    </div>
</template>

<script>
export default {
  name: 'Navbar'
}
</script>