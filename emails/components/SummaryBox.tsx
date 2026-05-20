import { Section } from '@react-email/components';
import * as React from 'react';
import { theme } from '../styles/theme';

interface SummaryBoxProps {
  children: React.ReactNode;
}

export const SummaryBox = ({ children }: SummaryBoxProps) => {
  return (
    <Section style={boxStyle}>
      {children}
    </Section>
  );
};

const boxStyle = {
  backgroundColor: theme.colors.surface,
  padding: '24px',
  borderRadius: theme.radius.md,
  border: `1px solid ${theme.colors.border}`,
  margin: '24px 0',
};

export default SummaryBox;
