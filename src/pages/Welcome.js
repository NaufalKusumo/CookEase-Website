import React, { useState } from 'react';

const Welcome = () => {
  const [showModal, setShowModal] = useState(true);

  const handleCloseModal = () => {
    setShowModal(false);
  };

  const handleResepDapur = () => {
    // Navigate to Resep Dapur
    handleCloseModal();
  };

  const handleTipsDapur = () => {
    // Navigate to Tips Dapur
    handleCloseModal();
  };

  return (
    <div>
      {showModal && (
        <div style={{
          position: 'fixed',
          top: 0, left: 0, right: 0, bottom: 0,
          background: 'rgba(0,0,0,0.2)',
          display: 'flex',
          alignItems: 'center',
          justifyContent: 'center',
          zIndex: 1000
        }}>
          <div style={{
            background: '#fff',
            borderRadius: 16,
            padding: '32px 24px 24px 24px',
            minWidth: 320,
            position: 'relative',
            boxShadow: '0 2px 12px rgba(0,0,0,0.08)'
          }}>
            {/* Close icon */}
            <button
              onClick={handleCloseModal}
              style={{
                position: 'absolute',
                top: 16,
                right: 16,
                background: 'none',
                border: 'none',
                fontSize: 24,
                color: '#6B6258',
                cursor: 'pointer',
                lineHeight: 1
              }}
              aria-label="Close"
            >
              ×
            </button>
            {/* Title */}
            <div style={{
              fontWeight: 700,
              fontSize: 20,
              textAlign: 'center',
              marginBottom: 32
            }}>
              Apa yang akan kamu buat
            </div>
            {/* Buttons */}
            <div style={{
              display: 'flex',
              justifyContent: 'center',
              gap: 24
            }}>
              <button
                onClick={handleResepDapur}
                style={{
                  background: '#F5F5F5',
                  border: 'none',
                  borderRadius: 10,
                  padding: '12px 24px',
                  fontSize: 18,
                  color: '#222',
                  fontWeight: 500,
                  cursor: 'pointer'
                }}
              >
                Resep Dapur
              </button>
              <button
                onClick={handleTipsDapur}
                style={{
                  background: '#F5F5F5',
                  border: 'none',
                  borderRadius: 10,
                  padding: '12px 24px',
                  fontSize: 18,
                  color: '#222',
                  fontWeight: 500,
                  cursor: 'pointer'
                }}
              >
                Tips Dapur
              </button>
            </div>
          </div>
        </div>
      )}
    </div>
  );
};

export default Welcome;