let players = [];
let currentPlayerIndex = -1;

const addPlayer = () => {
  const playerName = document.getElementById('playerName').value;
  if (playerName.trim() === '') {
    alert('Entrez un nom de joueur.');
    return;
  }
  players.push(playerName);
  document.getElementById('playerName').value = '';
  updatePlayerList();
};

const updatePlayerList = () => {
  const playersList = document.getElementById('players');
  playersList.innerHTML = '';
  players.forEach((player, index) => {
    playersList.innerHTML += `<li>${index + 1}. ${player}</li>`;
  });
};

const startGame = () => {
  if (players.length < 2) {
    alert('Ajoutez au moins deux joueurs pour commencer.');
    return;
  }

  // Masquer le formulaire d'ajout de joueurs
  document.querySelector('.player-list').classList.add('hidden');

  // Activer les boutons Action/Vérité
  document.getElementById('startGame').disabled = true;
  document.getElementById('actionTruthButtons').classList.remove('hidden');
  document.getElementById('question').innerHTML = '<p>En attente du choix...</p>';
  nextTurn(); // Choisit le premier joueur
};

const nextTurn = () => {
  if (players.length === 0) return;

  // Passer au joueur suivant
  currentPlayerIndex = (currentPlayerIndex + 1) % players.length;
  document.getElementById('currentPlayer').classList.remove('hidden');
  document.getElementById('currentPlayer').innerHTML = `
    <h3>C'est le tour de ${players[currentPlayerIndex]} !</h3>`;

  // Réinitialise la question
  document.getElementById('question').innerHTML = '<p>En attente du choix...</p>';
  document.getElementById('actionTruthButtons').classList.remove('hidden');
  document.getElementById('questionSection').classList.add('hidden');
};

const choose = async (type) => {
  const endpoint =
    type === 'action'
      ? 'http://truth_or_dare.test/api/dare'
      : 'http://truth_or_dare.test/api/truth';

  try {
    const response = await fetch(endpoint, { method: 'GET' });

    if (!response.ok) {
      throw new Error('Erreur lors de la récupération des données');
    }

    const data = await response.json();
    const question = data.data.length
      ? data.data[Math.floor(Math.random() * data.data.length)][type === 'action' ? 'dare' : 'truth']
      : 'Aucune question disponible.';

    // Affiche la question
    document.getElementById('question').innerHTML = `
      <p>${type.toUpperCase()} : ${question}</p>`;
    document.getElementById('questionSection').classList.remove('hidden');
    document.getElementById('actionTruthButtons').classList.add('hidden');
  } catch (error) {
    console.error('Erreur :', error);
    document.getElementById('question').innerHTML = `
      <p>Erreur : Impossible de récupérer les questions.</p>`;
  }
};
