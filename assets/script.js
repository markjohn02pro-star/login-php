document.addEventListener("DOMContentLoaded", () => {

    // Show or hide passwords
    document.querySelectorAll("[data-toggle-password]").forEach(button => {
        button.addEventListener("click", () => {
            const inputId = button.dataset.togglePassword;
            const input = document.getElementById(inputId);

            if (!input) return;

            const showing = input.type === "text";
            input.type = showing ? "password" : "text";

            button.innerHTML = showing
                ? '<i class="bi bi-eye"></i>'
                : '<i class="bi bi-eye-slash"></i>';

            button.setAttribute(
                "aria-label",
                showing ? "Show password" : "Hide password"
            );
        });
    });

    // Registration password strength
    const password = document.getElementById("regPassword");
    const confirmPassword = document.getElementById("confirmPassword");
    const strengthBar = document.getElementById("strengthBar");
    const strengthText = document.getElementById("strengthText");
    const matchText = document.getElementById("matchText");

    function checkStrength(value) {
        if (!strengthBar || !strengthText) return;

        if (!value) {
            strengthBar.style.width = "0";
            strengthText.textContent = "Use at least 8 characters";
            return;
        }

        let score = 0;

        if (value.length >= 8) score++;
        if (/[a-z]/.test(value) && /[A-Z]/.test(value)) score++;
        if (/\d/.test(value)) score++;
        if (/[^A-Za-z0-9]/.test(value)) score++;

        const levels = [
            { width: "25%", color: "#ef4444", text: "Weak password" },
            { width: "50%", color: "#f59e0b", text: "Fair password" },
            { width: "75%", color: "#06b6d4", text: "Good password" },
            { width: "100%", color: "#10b981", text: "Strong password" }
        ];

        const level = levels[Math.max(0, score - 1)];

        strengthBar.style.width = level.width;
        strengthBar.style.background = level.color;
        strengthText.textContent = level.text;
    }

    function checkMatch() {
        if (!password || !confirmPassword || !matchText) return;

        if (!confirmPassword.value) {
            matchText.textContent = "";
            confirmPassword.setCustomValidity("");
            return;
        }

        const matches = password.value === confirmPassword.value;

        matchText.textContent = matches
            ? "Passwords match"
            : "Passwords do not match";

        matchText.style.color = matches ? "#059669" : "#dc2626";

        confirmPassword.setCustomValidity(
            matches ? "" : "Passwords do not match"
        );
    }

    if (password) {
        password.addEventListener("input", () => {
            checkStrength(password.value);
            checkMatch();
        });
    }

    if (confirmPassword) {
        confirmPassword.addEventListener("input", checkMatch);
    }
});




const sidebar = document.getElementById("sidebar");
const menuBtn = document.getElementById("menuBtn");
const closeSidebar = document.getElementById("closeSidebar");
const generateBtn = document.getElementById("generateBtn");
const promptInput = document.getElementById("promptInput");
const chatArea = document.getElementById("chatArea");
const searchInput = document.getElementById("searchInput");
const historyList = document.getElementById("historyList");

// Sidebar toggle
menuBtn.addEventListener("click", () => {
  sidebar.classList.add("show");
});

closeSidebar.addEventListener("click", () => {
  sidebar.classList.remove("show");
});

// Search history
searchInput.addEventListener("input", () => {
  const value = searchInput.value.toLowerCase();

  document.querySelectorAll(".history-item").forEach(item => {
    item.style.display = item.textContent
      .toLowerCase()
      .includes(value) ? "flex" : "none";
  });
});

// Suggestion cards
document.querySelectorAll(".suggestion-card").forEach(card => {
  card.addEventListener("click", () => {
    promptInput.value = card.dataset.prompt;
    promptInput.focus();
  });
});

// New generation
document.getElementById("newChat").addEventListener("click", () => {
  chatArea.innerHTML = "";
  promptInput.value = "";
  promptInput.focus();
});

// Generate UI interaction
generateBtn.addEventListener("click", () => {
  const prompt = promptInput.value.trim();

  if (!prompt) {
    promptInput.focus();
    return;
  }

  const size = document.getElementById("imageSize").value;
  const style = document.getElementById("imageStyle").value;

  // User message
  const userMessage = document.createElement("div");
  userMessage.className = "message user-message";

  const label = document.createElement("div");
  label.className = "message-label";
  label.textContent = "You";

  const description = document.createElement("p");
  description.textContent = prompt;

  userMessage.append(label, description);
  chatArea.appendChild(userMessage);

  // Placeholder response
  const response = document.createElement("div");
  response.className = "message";

  const responseTitle = document.createElement("div");
  responseTitle.className = "message-label";
  responseTitle.textContent = "PixelAI";

  const result = document.createElement("div");
  result.className = "result-placeholder";
  result.textContent =
    `Generation request prepared · ${style} · ${size}. Connect an AI image generation API to create the actual image.`;

  response.append(responseTitle, result);
  chatArea.appendChild(response);

  // Add to history
  const historyItem = document.createElement("a");
  historyItem.href = "#";
  historyItem.className = "history-item";
  historyItem.textContent = prompt.length > 25
    ? prompt.substring(0, 25) + "..."
    : prompt;

  historyItem.addEventListener("click", e => {
    e.preventDefault();
    promptInput.value = prompt;
  });

  historyList.prepend(historyItem);

  chatArea.scrollIntoView({
    behavior: "smooth",
    block: "end"
  });

  promptInput.value = "";
});

// Enter to generate, Shift+Enter for newline
promptInput.addEventListener("keydown", e => {
  if (e.key === "Enter" && !e.shiftKey) {
    e.preventDefault();
    generateBtn.click();
  }
});
