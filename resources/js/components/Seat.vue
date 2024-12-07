<template>
  <div>
    <!-- Seat Table -->
    <table class="mx-auto border-collapse border-spacing-2">
      <tbody>
        <tr v-for="(row, rowIndex) in rows" :key="rowIndex">
          <td v-for="(col, colIndex) in cols" :key="colIndex" class="text-center p-2">
            <!-- Seat Label -->
            <div :class="getSeatClass(rowIndex, colIndex)"
              class="w-[48px] h-[48px] flex items-center justify-center rounded-md"
              @click="selectSeat(rowIndex, colIndex)">
              {{ String.fromCharCode(65 + rowIndex) }}{{ colIndex + 1 }}
            </div>
          </td>
        </tr>
      </tbody>
    </table>

    <!-- Seat Legend -->
    <div class="mt-8 flex space-x-6 justify-center">
      <div class="flex items-center">
        <div class="w-[24px] h-[24px] rounded bg-primary-100 mr-2"></div>
        <span>Available</span>
      </div>
      <div class="flex items-center">
        <div class="w-[24px] h-[24px] rounded bg-primary-700 mr-2"></div>
        <span>Reserved</span>
      </div>
      <div class="flex items-center">
        <div class="w-[24px] h-[24px] rounded bg-green-500 mr-2"></div>
        <span>Selected</span>
      </div>
    </div>

    <!-- Selected Seats Cards -->
    <div class="divide-y mt-10 w-full">
      <div v-if="selectedSeats.length" class="mt-6 grid grid-cols-1 gap-6 text-left divide-y">
        <div v-for="(seat, index) in selectedSeats" :key="index" class="block w-full p-4 bg-white  dark:bg-gray-800">
          <h5 class="mb-2 text-lg font-semibold tracking-tight text-gray-900 dark:text-white">
            Row {{ String.fromCharCode(65 + seat.row) }}, Seat {{ seat.col + 1 }}
          </h5>
          <p class="font-normal text-gray-700 dark:text-gray-400">
            Price ${{ ticketPrice }}
          </p>
        </div>
      </div>

      <!-- Total Price Text -->
      <div v-if="selectedSeats.length" class="mt-4 text-xl font-semibold text-gray-900">
        <table class="mx-auto table-auto border-collapse border-spacing-2 w-full">
          <thead>
          </thead>
          <tbody>
            <!-- Total Price Row -->
            <tr>
              <td class="px-4 py-4 text-lg font-bold text-left">Total</td>
              <td class="px-4 py-4 text-lg font-bold text-right">
                ${{ totalPrice }}
              </td>
            </tr>
          </tbody>
        </table>

        <button type="button"
          class="text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium text-lg rounded-lg w-full py-2.5 text-center inline-flex justify-center items-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
          @click="reserveSeats">
          Checkout
          <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M1 5h12m0 0L9 1m4 4L9 9" />
          </svg>
        </button>

      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      rows: 5, // Number of rows
      cols: 10, // Number of columns
      seatStatus: [], // 2D array for seat statuses
      selectedSeats: [], // Array to store selected seats (multiple)
      ticketPrice: 100, // Ticket price for each seat
    };
  },
  created() {
    // Initialize seat statuses to "available"
    this.seatStatus = Array.from({ length: this.rows }, () =>
      Array(this.cols).fill("available")
    );
  },
  computed: {
    // Calculate the total price for all selected seats
    totalPrice() {
      return this.selectedSeats.length * this.ticketPrice;
    },
  },
  methods: {
    getSeatClass(row, col) {
      // Return CSS classes based on seat status
      const status = this.seatStatus[row][col];
      if (status === "available")
        return "bg-primary-100 text-gray-800 hover:bg-green-500 hover:text-white cursor-pointer";
      if (status === "reserved")
        return "bg-primary-700 text-white cursor-not-allowed";
      if (status === "selected")
        return "bg-green-500 text-white cursor-pointer";
    },
    selectSeat(row, col) {
      if (this.seatStatus[row][col] === "reserved") return;

      const seatIndex = this.selectedSeats.findIndex(
        (seat) => seat.row === row && seat.col === col
      );

      // If the seat is already selected, deselect it
      if (seatIndex >= 0) {
        this.selectedSeats.splice(seatIndex, 1);
        this.seatStatus[row][col] = "available";
      } else {
        // Otherwise, select it
        this.selectedSeats.push({ row, col });
        this.seatStatus[row][col] = "selected";
      }
    },
    reserveSeats() {
      if (this.selectedSeats.length === 0) return;

      // Reserve all selected seats
      this.selectedSeats.forEach((seat) => {
        this.seatStatus[seat.row][seat.col] = "reserved";
      });

      // Clear selected seats
      this.selectedSeats = [];

      alert("Seats reserved successfully!");
    },
  },
};
</script>

<style>
/* Optional custom styling */
</style>
