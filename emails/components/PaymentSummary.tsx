import { Section } from '@react-email/components';
import * as React from 'react';
import { theme } from '../styles/theme';
import InfoRow from './InfoRow';

interface PaymentSummaryProps {
  amount: string;
  dueDate?: string;
  concept?: string;
}

export const PaymentSummary = ({ amount, dueDate, concept }: PaymentSummaryProps) => {
  return (
    <Section style={containerStyle}>
      {concept && <InfoRow label="Concepto" value={concept} />}
      {dueDate && <InfoRow label="Fecha límite" value={dueDate} />}
      <InfoRow 
        label="Importe" 
        value={<span style={{ color: theme.colors.primaryDark, fontWeight: '700', fontSize: '18px' }}>{amount}</span>} 
        last 
      />
    </Section>
  );
};

const containerStyle = {
  backgroundColor: theme.colors.background,
  padding: '16px 24px',
  borderRadius: theme.radius.md,
  border: `1px solid ${theme.colors.accentSoft}`,
  margin: '24px 0',
};

export default PaymentSummary;
